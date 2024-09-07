<!DOCTYPE html>

<html>

<head>
  <title>Contactus Form</title>
        <style>
            .error
            {
              color:red;
            }
            .successmsg
            {

             color:blue;
            }
            .contentwrapper
            {
                float:left;
                margin: 0 auto auto;
                width: 100%;
                height:100%;
                background: rgb(255,225,240);
            }
            .divcontent
            {
                margin:auto;
                 width:1100px;
                 height:700px;
            }
            .divouter
            {
                 float:left;
                 width:990px;
                 height:auto;
                 padding-top:40px;

            }
            .divheading
            {
              float:left;
              width:970px;
              height: 30px;
              padding-top:2px;
              font-size:24px;
              text-align:center;
            }
            .divreq
            {
              float:left;
              width:970px;
              height: 40px;
              padding-top:2px;
              font-size:20px;
              text-align:center;
            }
            .lbl
            {
                float:left;
                width:220px;
                height:70px;
                padding-left:100px;
                text-align:right;
                padding-right:10px;
                font-size:20px;
               /* border: solid 1px pink;*/
            }
            .txt
            {
                  float:left;
                width:270px;
                height:70px;
                padding-right:70px;
                /* border: solid 1px black;*/

            }
            .spancl
            {
                 float:left;
                width:310px;
                height:70px;
                 /* border: solid 1px red;*/
            }
            .lblmsg
            {
               float:left;
                width:220px;
                height:120px;
                padding-left:100px;
                text-align:right;
                padding-right:10px;
                font-size:20px;
                /* border: solid 1px pink;*/
            }
            .txtmsg
            {
                  float:left;
                width:270px;
                height:120px;
                padding-right:70px;
                 /* border: solid 1px black;*/

            }
            .btnsubmit
            {
                    float:left;
                    width:970px;
                    height:30px;
                    text-align:center;
                     /* border: solid 1px red;*/
            }
            .succmsg
            {
                float: left;
                width:970px;
                height:50px;
                font-size:20px;
                color:blue;
                text-align:center;
                /* border: solid 1px red;*/
            }

        </style>
</head>

<body>
    <?php
        $errName=$errPhoneNo=$errEmail=$errSubject=$errMessage="";
        $name=$phoneno=$email=$subject=$message="";
        $errFlag=0;
       if($_SERVER["REQUEST_METHOD"]=="POST")
       {

            //Name Validation
           if(empty($_POST["txtname"] ))
           {
               $errName="Full Name is requried";
           }
           else
           {
              $name=test_data($_POST["txtname"]);
              if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
              {
                  $errName="Only Letters and Whitespaces allowed";
              }
           }

           //Phone No Validation
           if(empty($_POST["txtphoneno"] ))
           {
               $errPhoneNo="Phone Number is requried";
           }
           else
           {
              $phoneno=test_data($_POST["txtphoneno"]);
              if(!preg_match("/^[0-9]{10}$/",$phoneno))
              {
                  $errPhoneNo="Enter Valid Phone No";
              }
           }

           //emaild validation
           if(empty($_POST["txtemail"] ))
           {
               $errEmail="Email id is requried";
           }
           else
           {
              $email=test_data($_POST["txtemail"]);
              if(!filter_var($email,FILTER_VALIDATE_EMAIL))
              {
                    $errEmail="Enter Valid Email ID";
              }
           }

           //Subject validation
           if(empty($_POST["txtsubject"] ))
           {
               $errSubject="Subject is requried";
           }
           else
           {
              $subject=test_data($_POST["txtsubject"]);
           }

           //message validation
           if(empty($_POST["txtcomment"] ))
           {
               $errMessage="Message is requried";
           }
           else
           {
              $message=test_data($_POST["txtcomment"]);
           }

       }
       function test_data($data)
       {
           $data=trim($data);
           $data=stripslashes($data);
           $data=htmlspecialchars($data);
           return $data;
       }

       function stmsg($errName,$errPhoneNo,$errEmail,
       $errSubject,$errMessage,$name,$phoneno,$email,$subject,$message)
      {
          $st='';
        if(($errName == '') && ($errPhoneNo == '') && ($errEmail =='') && ($errSubject=='') )
        {
            if(($name !='') || ($email !='') || ($phoneno !='') || ($subject != '') )
            {
                $st="Your Message sent successfully";
            }

        }
        else
        {
            $st='';
        }
        return $st;
    }
    ?>

    <div class="contentwrapper" align="">
        <div class="divcontent">
            <div class="divouter">

        <div class="divheading">ContactUs Form</div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="divreq">
             <span class="error">* required Field  </span>
             </div>

             <div class="lbl">
                  Full Name :
             </div>
             <div class="txt">
                 <input type="text" name="txtname" style="width:300px;height:30px;" />
             </div>
             <div class="spancl">
                 <span class="error"> * <?php echo $errName; ?></span>
             </div>


             <div class="lbl">
                    Phone no :
             </div>
             <div class="txt">
                 <input type="text" name="txtphoneno" style="width:300px;height:30px;" />
             </div>
             <div class="spancl">
                <span class="error">* <?php echo $errPhoneNo; ?></span>
             </div>

              <div class="lbl">
                     Email id :
              </div>
             <div class="txt">
                     <input type="text" name="txtemail" style="width:300px;height:30px;" />
             </div>
             <div class="spancl">
                <span class="error">* <?php echo $errEmail; ?></span>
             </div>

              <div class="lbl">
                Subject :
              </div>

             <div class="txt">
                <input type="text" name="txtsubject" style="width:300px;height:30px;" />
              </div>
             <div class="spancl">
                <span class="error">* <?php echo $errSubject; ?></span>
             </div>


             <div class="lblmsg">
                Message :
             </div>

             <div class="txtmsg">
                <textarea name="txtcomment" rows="7" cols="40"></textarea>
             </div>
             <div class="spancl">
                <span class="error">* <?php echo $errMessage; ?></span>
             </div>

          <div class="btnsubmit">
            <input type="submit"  name="btnsubmit" value="submit" />
          </div>

           <div class="succmsg">
             <span class='successmsg'><?php echo stmsg($errName,$errPhoneNo,$errEmail,
            $errSubject,$errMessage,$name,$phoneno,$email,$subject,$message);
             ?></span>
         </div>
        

        </form>
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="dbexam";

    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    {
        die("connection Failed :".$conn->connect_error);

    }
    if(($errName == '') && ($errPhoneNo == '') && ($errEmail =='') && ($errSubject=='') )
    {
        if(($name !='') || ($email !='') || ($phoneno !='') || ($subject != '') )
        {
            $errFlag=1;
        }
    }

    $sqlst="select * from tblcontactus where CID=(select MAX(CID) from tblcontactus)";
    $resultst=$conn->query($sqlst);
    if($resultst->num_rows>0)
    {
       while($row=$resultst->fetch_assoc())
       {
            $namest=$row["Name"];
            $phonenost=$row["Phoneno"];
            $emailst=$row["Emailid"];
            $subjectst=$row["Subject"];
            $messagest=$row["Message"];

       }
       if(($name==$namest) && ($phoneno==$phonenost)
       && ($email==$emailst) && ($subject==$subjectst) && ($message==$messagest))
       {
           $matchfound='yes';
       }
       else
       {
           $matchfound='No';
       }
    }
    else
    {
           $matchfound='No';
    }

    $sql="select MAX(convert(CID,Unsigned)) from tblcontactus";

    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        $row=$result->fetch_row();
        if($row[0]!='')
        {
            $cid=$row[0];
            $cid=$cid+1;
        }
        else
        {
            $cid="1";
        }
    }
    else
    {
        $cid="1";
    }
    $ipaddress=$_SERVER["REMOTE_ADDR"];
    $t=time();
    $curdate=date('Y-m-d',$t);
     // echo "errorflag = ".$errFlag."<br>";
    if(($errFlag==1) && ($matchfound=='No'))
    {
         $sqlins="INSERT INTO tblcontactus(CID,Name,Phoneno,Emailid,Subject,Message,Ipaddress,Tdate)
        Values ('$cid','$name','$phoneno','$email','$subject','$message','$ipaddress','$curdate')";

        //echo "ins query=".$sqlins."<br>";
        if($conn->query($sqlins))
        {
            //echo "record inserted successfully";
        }
        else
         {
             echo "Error: " . $sqlins . "<br>" . $conn->error;
         }

        $errFlag=0;

        $to="ranjani.rathi@gmail.com";
        $subjectE=$subject;
        $msg="<html>
                <body>
                <table border='1'>
                   <tr>
                        <th>Field Name</th>
                        <th>Content</th>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td>".$name."</td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td>".$phoneno."</td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td>".$email."</td>
                    </tr>
                    <tr>
                      <td>Subject</td>
                      <td>".$subject."</td>
                    </tr>
                    <tr>
                      <td>Message</td>
                      <td>".$message."</td>
                    </tr>
                   </table>
                </body>
                </html>
        ";
        $headers="MIME-Version: 1.0"."\r\n";
        $headers .="Content-type:text/html;charset=UTF-8" ."\r\n";
        $headers .= 'From: <ranjani.rathi@gmail.com>'."\r\n";
        $headers .= 'ranjanirajesh2017@gmail.com' . "\r\n";

        if((mail($to,$subjectE,$msg,$headers)))
        {
            //echo "mail sent";
        }
        else
        {
           //echo "mail failed";
        }
}

?>          </div>
        </div>
    </div>
</body>
</html>