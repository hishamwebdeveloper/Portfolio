<?php
class ShopModel extends Model {
  public function Index() {
    $this->query('SELECT * FROM product');
    $rows = $this->resultSet();
    return $rows;
  }
}