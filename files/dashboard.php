<?php
    
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:../index.php');
    }
    //$data = [];
    $data = $_SESSION['data'];
    //echo var_dump($data);

    if($_SESSION['status']==1){
        $status = '<b class="text-success">Voted</b>';
    }
    else{
        $status = '<b class="text-danger">Not Voted</b>';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System- Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">
    <div class="container my-5">
        <a href="../index.php">
            <button class="btn btn-success text-dark px-3">Back</button>
        </a>
        
        <a href="logout.php">
            <button class="btn btn-danger text-dark px-3">Log out</button>
        </a>
        <br/>
        <br/>
        <b style="font-size:20px; color:cornflowerblue; ">Welcome, <?php echo $data['username'];?> </b><br/>
        <h1 class="my-3">Dashboard</h1>
        
        <div class="row my-5">
            
            <div class="col-md-7">
                <?php 
                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0;$i<count($groups);$i++){
                ?>
                <div class="row">
                <div class="col-md-4">
                    <img style="width: 100px; border-radius: 45%; object-fit:contain;" src="./images/<?php echo $groups[$i]['image'] ;?>" alt="group-image">
                </div>
                <div class="col-md-8">
                    <strong class="text-light h5">Group Name: </strong>
                    <?php echo $groups[$i]['username'] ;?><br/>
                    <strong class="text-light h5">Votes: </strong>
                    <?php echo $groups[$i]['votes'] ;?><br/>
                </div>
                </div>
                
                <form action="./backend/voting.php" method="POST">
                    <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes'] ?>">
                    <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id'] ?>">

                    <?php 
                        if($_SESSION['status']==1){
                    ?>
                    <b style="margin-left:10px;" class="my-3 text-success px-3 ">Voted</b>
                    <?php
                        }
                        else{
                    ?>
                    <button style="margin-left:10px;" class="bg-warning my-3 text-black px-3" type="submit">Vote</button>
                    <?php
                        }
                    ?>

                </form>
                <hr>
                <?php
                        }
                    }
                    else{
                ?>
                <div class="container">
                    <p>
                        No Groups Are Present.
                    </p>
                </div>
                <?php
                    }
                ?>  
            </div>
            <div class="col-md-5">
                <!-- user -->
                <img style="width: 100px; border-radius: 45%; object-fit:contain;" src="./images/<?php echo $data['image']; ?>" alt="user-image">
                <br>
                <br>
                <strong class="text-light h5">Name: </strong><?php echo $data['username']; ?><br><br>
                <strong class="text-light h5">Mobile: </strong><?php echo $data['mobile']; ?><br><br>
                <strong class="text-light h5">Status: </strong><?php echo $status; ?><br><br>
            </div>

        </div>
    </div>
    
</body>
</html>