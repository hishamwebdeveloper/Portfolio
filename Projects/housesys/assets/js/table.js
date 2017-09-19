$(document).ready(function(){
	
	//Edit function
	$(".change").click(function(e) {
		e.preventDefault();
		
		var $target = $(this).parents('tbody').find('td input, td select').not(".permaDisabled");
		
		if($target.prop("disabled"))
		{
			//Get data
			$target.each(function() {
				$(this).attr("defaultvalue", $(this).val());
			});
			
			$(this).parent().hide();
			$(this).parent().parent().find('.confirmation').show();
			$target.prop('disabled', false);
		}
		else
		{
			//Throw back data
			$target.each(function() {
				$(this).val($(this).attr("defaultvalue"));
			});
			
			$(this).parent().hide();
			$(this).parent().parent().find('.options').show();
			$target.prop('disabled', true);
		}
	});
	
	
	
	
	/* Task functions */
	/* -------------- */
	$("#emp").change(function(e) {
		
		var empData = $(this).val();
		
		$.ajax
		({
			url:"http://localhost/wyl/salary/ajaxsalary",
			type:"POST",
			data:
			{
				employee: empData
			},
			dataType:"json"
		}).done(function(data)
		{
			$('.task').parent().removeData('option');
			
			//Remove taskDetails Options
			$(".createTask").find('td input, td select option').remove();
			$(".createTask").find('input').attr("value",null);
			
			$('.task').append($("<option></option>").attr("value", "select").text("Select Task"));
			
			for(var i in data)
			{
				$('.task').append($("<option></option>").attr("value",data[i]["taskid"]).text(data[i]["taskdetails"]));
			}
			
			calculateSalaryPay();
		});
		
	});
	
	function clickTask() 
	{
		$(".task").on("change", function(e)
		{
			var taskNo = $(this).val();
			var taskText = $(this).text();
			var $taskInputs = $(this).parents('tr');
			var $current = $(this);
			var $taskParent = $(this).parent();
			var $oldData;
			
			//Get taskid and paste data to others
			$.ajax
			({
				url:"http://localhost/wyl/salary/ajaxsalary",
				type:"POST",
				data:
				{
					task: taskNo
				},
				dataType:"json"
			}).done(function(data)
			{	
				//Check if data exist
				if(typeof $taskParent.data('option')==='undefined')
				{
					//Create data
					$taskParent.data('option', { value: "select", text:"Select Task" } );
				}
				
				//Check if current task details option value = select
				if($taskParent.data('option').value!="select")
				{
					//Check next data = select
					if(taskNo!="select")
					{
						//Show old stuff
						$('.task').not($current).find('option[value="'+$taskParent.data("option").value+'"]').show();
						//Hide
						$('.task').not($current).find('option[value="'+taskNo+'"]').hide();
						//Take new stuff
						$taskParent.data('option', { value: taskNo, text: taskText } );
					}
					else
					{
						//Hide next data
						$('.task').not($current).find('option[value="'+$taskParent.data("option").value+'"]').show();
						//Store select data
						$taskParent.data('option', { value: "select", text: "Select Task" } );
					}
				}
				else
				{
					//Currently in select and changing to details. Nothing to show so I store new task in oldData
					$('.task').not($current).find('option[value="'+taskNo+'"]').hide();
					$taskParent.data('option', { value: taskNo, text: taskText } );
				}
				
				
				
				
				
				if (taskNo=="select")
				{
					return;
				}
				
				
				
				//Remove task inputs
				$taskInputs.find('td input, td select').not(".task").remove();
				//Add ask inputs
				$taskInputs.find('td').eq(1).append('<input value="'+ data[0]["taskdate"] + '" name="taskDate[]" type="text" class="permaDisabled" disabled/>');
				$taskInputs.find('td').eq(2).append('<input value="'+ data[0]["taskcost"] + '" name="taskCost[]" type="text" class="permaDisabled" readonly/>');
				$taskInputs.find('td').eq(3).append($('<select name="taskHouse" class="permaDisabled" disabled/>'));
				$taskInputs.find('td select').not(".task").append($("<option></option>").attr("value",data[0]["houseid"]).text(data[0]["houseno"]+" "+data[0]["houselocation"]));
				$taskInputs.find('input[name="taskid[]"]').attr("value",data[0]["taskid"]);
				calculateSalaryPay();
				
			});		
		});
	}
	
	
	//Add new task row
	$(".addition").click(function(e)
	{
		e.preventDefault();
		$('.createTask').parents('tbody').append('<tr class="createTask"></tr>');
		var $taskInputs = $('.createTask').parents('tbody').find('tr:last');
		$taskInputs.append('<th class="num">-</th>');
		$taskInputs.append('<td><select name="taskDetails[]" class="task"></select></td>');
		$taskInputs.append('<td> <input value="" name="taskDate[]" type="text" class="permaDisabled" disabled/> </td>');
		$taskInputs.append('<td><input value="" name="taskCost[]" type="text" class="permaDisabled" readonly/></td>');
		$taskInputs.append('<td><select name="taskHouse[]"></select></td>');
		$taskInputs.append('<input value="" name="taskid[]" type="hidden">');
		
		/* The Idea is to refresh the bind on click*/
		//Remove handler
		$(".task").off();
		//Call handler
		clickTask();
	});

	function calculateSalaryPay()
	{
		var $cost = $(".createTask").find('input[name="taskCost[]"]');
		var $salaryPay = $('input[name="addSalaryPay"');
		var totalCost=0;
		
		$cost.each(function()
		{
			//Loop through while defined
			if($cost.val()!=0)
			{
				totalCost += parseInt($(this).val());
			}
		});
		
		if(totalCost!=0)
		{
			$salaryPay.attr("value", totalCost);
		}
		else
		{
			$salaryPay.attr("value", totalCost);
		}
		
	
	};
	
	clickTask();
});