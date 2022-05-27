<?php
    header('Content-Type: text/html; charset=UTF-8');
    //array(PDO::ATTR_PERSISTENT => true)
    if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["date"]))
    {   
        
        $user='u47755';
        $pass='2914865';
        $dsn = 'mysql:host=localhost;dbname=u47755';
        //$conn= new PDO('mysql:host=localhost;dbname=u47755', $user, $pass);
        try {
            $conn = new PDO($dsn, $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        //$conn->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $Insert_form=$conn->prepare("INSERT INTO Ex3 (Fio, Email, Date_birth, Sex, Count_limbs, Abilitys, Biography) 
            VALUES (:Fio, :Email, :Date_birth, :Sex, :Count_limbs, :Abilitys, :Biography)");

            $Insert_form->bindParam(':Fio',$Fio);
            $Insert_form->bindParam(':Email',$Email);
            $Insert_form->bindParam(':Date_birth',$Date_birth);
            $Insert_form->bindParam(':Sex',$Sex);
            $Insert_form->bindParam(':Count_limbs',$Count_limbs);
            $Insert_form->bindParam(':Abilitys',$Abilitys);
            $Insert_form->bindParam(':Biography',$Biography);

            $Fio=$_POST["name"];
            $Email=$_POST["email"];
            $Date_birth=$_POST["date"];
            $Sex=$_POST["sex"];
            $Count_limbs=$_POST["count_limbs"];
            $Abilitys=$_POST["superpowers"];
            $Biography=$_POST["biography"];
            $Insert_form->execute();
        }catch(PDOException $e){
            print('Error : ' . $e->getMessage());
            exit();
        }
    }
    else
    {   
        print("Заполните все поля!");
    }

    header("Location: index.html");
?>