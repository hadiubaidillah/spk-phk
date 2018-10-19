<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Data_karyawan extends CI_Migration {

	public function up()
	{
		
		$this->dbforge->drop_table('karyawan', TRUE);
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'alamat' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'jml_siswa' => array(
				'type' => 'INT',
				'constraint' => '11',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('karyawan');

		$data = array(
			array(
				'id' => '1',
				'nama' => 'SMA ATHIRAH',
				'alamat' => 'Jl.Sunu',
				'jml_siswa' => '450'
			)
		);
		$this->db->insert_batch('karyawan', $data);

	}

	public function down()
	{
		$this->dbforge->drop_table('karyawan', TRUE);
	}
}
