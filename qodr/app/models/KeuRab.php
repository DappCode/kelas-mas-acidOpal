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

}
