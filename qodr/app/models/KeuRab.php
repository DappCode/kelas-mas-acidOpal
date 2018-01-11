<?php

class KeuRab extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $periode;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $nama_barang;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=true)
     */
    public $akun_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    public $jml_barang;

    /**
     *
     * @var integer
     * @Column(type="integer", length=8, nullable=true)
     */
    public $harga_satuan;

    /**
     *
     * @var string
     * @Column(type="string", length=8, nullable=true)
     */
    public $satuan_barang_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $total_harga;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $keterangan;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=true)
     */
    public $cabang_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qodr");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'keu_rab';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return KeuRab[]|KeuRab
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return KeuRab
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getDatabase()
    {
        $requestData = $_REQUEST;
        $requestSearch = strtoupper($requestData['search']['value']);

        $columns = array(
            0 => 'No.',
            1 => 'id',
            2 => 'periode ',
            3 => 'nama_barang',
            4 => 'akun_id',
            5 => 'jml_barang',
            6 => 'harga_satuan ',
            7 => 'satuan_barang_id',
            8 => 'keterangan',
            9 => 'cabang_id',
        );

        $sql = "SELECT * FROM KeuRab";
        $query = $this->modelsManager->executeQuery($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;

        
        $data = array();
        $no = $requestData['start']+1;

        foreach ($query as $key => $value) {
            $dataUser = array();
            $dataUser[] = $no;
            $dataUser[] = $value->id;
            $dataUser[] = $value->periode;
            $dataUser[] = $value->nama_barang;
            $dataUser[] = $value->akun_id;
            $dataUser[] = $value->jml_barang;
            $dataUser[] = $value->harga_satuan;
            $dataUser[] = $value->satuan_barang_id;
            $dataUser[] = $value->keterangan;
            $dataUser[] = $value->cabang_id;
            $dataUser[] = '
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="return send_data_edit(\''.$value->id.'\');">
            Edit </button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="return send_data_delete(\''.$value->id.'\');">
            Delete </button>
            ';

            $data[] = $dataUser;
            $no++;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
        );
        return $json_data;
    }
}
