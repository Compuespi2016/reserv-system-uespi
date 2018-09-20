<?

if($num_setor == "" || $num_setor == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo deve ser preenchido');window.location.href='cadastrado_setor.html';</script>";
   }else{
       
        $result = mysqli_query($con,"SELECT * FROM setor WHERE id = '$num_setor'");

        if(mysqli_num_rows($result) == 0){
        	   
           $insert = mysqli_query($con,"INSERT INTO setor VALUES()"); 

        if($insert){

          echo"<script language='javascript' type='text/javascript'>alert('Sensor cadastrado com sucesso!');window.location.href='pag_prefeitura.php'</script>";
        
        }

        }else{

        	echo"<script language='javascript' type='text/javascript'>alert('Sensor já existe!');window.location.href='cadastrado_setor.html'</script>";


        }
      
        
      }