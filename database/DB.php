<?php

class database{

    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    // bij de construct leggen we de connectie aan met de database 
    public function __construct(){
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'schoen';

    // hier wordt er bij de "try" de connectie gemaakt met de database 
    try{
        $dsn = "mysql:host=$this->host;dbname=$this->database";
        $this->conn =new PDO ($dsn, $this->username, $this->password);
        }catch (PDOException $e) {
            // hier wordt er een error gegeven als de connectie niet werkt
            die ("Unable to connect. Error: " . $e.getMessage());
            
        }
    }

    //insert medewerker
    public function insert_admin(){
        // bij de "insert into"" statement zeggen we dat gegevens in willen zetten bij database
        $sql = "INSERT INTO medewerker VALUES (:id, :gebruikersnaam, :wachtwoord);";

        // hier wordt de sql statement klaar gemaakt om naar de database te worden gestuurd
        $stmt = $this->conn->prepare($sql);

        // bij de "execute" wordt de sql uitgevoerd
        $stmt->execute([
            'id'=> NULL,
            'gebruikersnaam' => 'admin',
            'wachtwoord' => password_hash('admin', PASSWORD_DEFAULT)
        ]);
    }

    //login medewerker
    public function loginMedewerker($gebruikersnaam, $wachtwoord){
        $sql = "SELECT id, gebruikersnaam, wachtwoord FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";

        // hier wordt de sql statement klaar gemaakt om naar de database te worden gestuurd
        $stmt = $this->conn->prepare($sql);

        // bij de "execute" wordt de sql uitgevoerd
        $stmt->execute([
            'gebruikersnaam' => $gebruikersnaam,
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
        if(is_array($result)){
            if(count($result) > 0){
                // zorgt ervoor dat gebruikersnaam EN wachtwoord allebei wel kloppen
                if($gebruikersnaam == $result['gebruikersnaam']  && password_verify($wachtwoord, $result['wachtwoord'])){
                    // if (!isset($_SESSION)){ // als er een error komt met session.
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['gebruikersnaam'] = $result['gebruikersnaam'];
                        
                        // redirect naar home_medewerker.
                        header("location: medewerker.php");
                    // }
                }
            }else{
                echo 'Error';
            }
        }else{
            echo 'Failed to login.';
        }
    }

    // registeren klant
    public function createKlant($statement, $named_placeholder, $location){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('location:'.$location);
        exit();
    }
    //login klant
    public function loginKlant($gebruikersnaam, $wachtwoord){
        $sql = "SELECT id, gebruikersnaam, wachtwoord FROM klant WHERE gebruikersnaam = :gebruikersnaam";

        // hier wordt de sql statement klaar gemaakt om naar de database te worden gestuurd
        $stmt = $this->conn->prepare($sql);

        // bij de "execute" wordt de sql uitgevoerd
        $stmt->execute([
            'gebruikersnaam' => $gebruikersnaam,
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
        if(is_array($result)){
            if(count($result) > 0){
                // zorgt ervoor dat gebruikersnaam EN wachtwoord allebei wel kloppen
                if($gebruikersnaam == $result['gebruikersnaam']  && password_verify($wachtwoord, $result['wachtwoord'])){
                    // if (!isset($_SESSION)){ // als er een error komt met session.
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['gebruikersnaam'] = $result['gebruikersnaam'];
                        $_SESSION['is_logged_in'] = true;
                        
                        // redirect naar home_medewerker.
                        header("location: klant.php");
                    // }
                }
            }else{
                echo  'Error';
            }
        }else{
            echo 'Failed to login.';
        }
    }

    public function excel($medewerker){

        $query = "SELECT * FROM medewerker";
    
        if($medewerker !== NULL){
            // query for specific user when a username is supplied
            $query .= 'WHERE medewerker = :medewerker';
        }
    
        $stmt = $this->conn->prepare($query);
    
        // check if username is supplied, if so, pass assoc array to execute
        $medewerker !== NULL ? $stmt->execute(['medewerker'=>$medewerker]) : $stmt->execute();
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //select data van de database
    public function select($statement, $named_placeholder){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //update and delete
    public function update_and_delete($statement, $named_placeholder, $location){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        header('location:'.$location);
        exit();
    }

    public function add($statement, $named_placeholder, $location){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        header('location:'.$location);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        exit();
    }
    
    //locatie dropmenu
    public function winkelvestiging($vestiging){
        $sql = "SELECT * FROM winkel WHERE vestigingsplaats = :locations";
        // prep
        $stmt = $this->conn->prepare($sql);
        // exec
        $stmt->execute([ 
            'locations' => $vestiging,
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function alert($statement, $query){
        $query = "SELECT COUNT(*) FROM bestelling WHERE `afgehaald` = 'nee' HAVING COUNT(*)";
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($query); 
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function add_reserveren($statement, $named_placeholder, $locatie){
        // $stmt = $this->conn->prepare($statement);
        // $stmt->execute($named_placeholder);
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // header("location: $locatie");
        // exit();
        try{
            // start transaction
            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare($statement);

            // INSERT INTO user VALUES id=NULL, username=:uname, password=:pass
            $stmt->execute($named_placeholder);

            // commit
            $this->conn->commit();

            header("location: $locatie");

        }catch(\Exception $e){
            $this->conn->rollback();
            echo "Error message" . $e->getMessage();
        }
        
    }
}