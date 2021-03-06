<?php

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=false)
     */
    public $cabang_id;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=false)
     */
    public $username;
    

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $password;

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
        return 'ref_user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
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
            0 => 'cabang_id',
            1 => 'username',
            2 => 'password',
            3 => 'type',
        );

        $sql = "SELECT * FROM Users";
        $query = $this->modelsManager->executeQuery($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;

        if (!empty($requestSearch)) {
            // function mencari data
            $sql = "SELECT * FROM Users WHERE username LIKE '%".$requestSearch."%'";
            $sql.= "OR cabang_id LIKE '%".$requestSearch."%'";
            $sql.= "OR type LIKE '%".$requestSearch."%'";
            $query = $this->modelsManager->executeQuery($sql);
            $totalFiltered = count($query);

            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
            $query = $this->modelsManager->executeQuery($sql);
        } else {
            $sql = "SELECT * FROM Users";
            $query = $this->modelsManager->executeQuery($sql);
        }

        $data = array();
        $no = $requestData['start']+1;

        foreach ($query as $key => $value) {
            $dataUser = array();
            $dataUser[] = $no;
            $dataUser[] = $value->cabang_id;
            $dataUser[] = $value->username;
            $dataUser[] = $value->password;
            $dataUser[] = $value->type;
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
