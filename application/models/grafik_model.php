<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafik_model extends CI_Model {

public function kedatangan()
 {  
  $sql= $this->db->query(" SELECT
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=1)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Januari,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=2)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Februari,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=3)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Maret,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=4)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS April,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=5)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Mei,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=6)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Juni,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=7)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Juli,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=8)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Agustus,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=9)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS September,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=10)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Oktober,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=11)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS November,
  IFNULL((SELECT COUNT(id) FROM (data_kedatangan)WHERE((MONTH(tanggal)=12)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS Desember
  FROM data_kedatangan GROUP BY YEAR(tanggal) ");
  return $sql;
 } 
}

/* End of file grafik_model.php */
/* Location: ./application/models/grafik_model.php */