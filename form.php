<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include 'top.php';

    $dataIsGood = false;
    $errorMessage = '';
    $message = '';

    $name = '';
    $email = '';
    $fiction = 0;
    $fantasy = 0;
    $mystery = 0;
    $nonfiction = 0;
    $age= '';
    $next='';

    function getData($field){
        if(!isset($_POST[$field])){
            $data = '';
        } else {
            $data = trim($_POST[$field]);
            $data = htmlspecialchars($data);
        }
        return $data;
    }   
    function verifyAlphaNum($testString){
        return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;

        $name = getData("txtName");
        $email = getData("txtEmail");
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $fiction = (int) getData("chkFiction");
        $fantasy = (int) getData("chkFantasy");
        $mystery = (int) getData("chkMystery");
        $nonfiction = (int) getData("chkNonfiction");
        $age = getData("btnAge");
        $next = getData("txtNext");
    

        print PHP_EOL . "<!-- Starting Validation -->" . PHP_EOL;
        $dataIsGood = true;

        if($name == ''){
            $errorMessage .= '<p class="mistake">Please enter your name</p>';
            $dataIsGood = false;
        } elseif(!verifyAlphaNum($name)){
            $errorMessage .= '<p class="mistake">Your name contains invalid characters. Please reenter it with appropiate characters</p>';
            $dataIsGood = false;
        }

        if($email == ''){
            $errorMessage .= '<p class="mistake">Please enter your email</p>';
            $dataIsGood = false;
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMessage .= '<p class="mistake">Your email contains invalid characters. Please reenter it with appropiate characters</p>';
            $dataIsGood = false;
        }

        $totalChecked = 0;

        if($fiction != 1) $fiction = 0;
        $totalChecked += $fiction;

        if($fantasy != 1) $fantasy = 0;
        $totalChecked += $fantasy;

        if($mystery != 1) $mystery = 0;
        $totalChecked += $mystery;

        if($nonfiction != 1) $nonfiction = 0;
        $totalChecked += $nonfiction;

        if ($totalChecked == 0){
            $errorMessage .= '<p class="mistake">Please choose at least one checkbox</p>';
            $dataIsGood = false;
        }

        if($age !="-18" AND $age !="19-30" AND $age !="31-50" AND $age !="51+" ){
            $errorMessage .= '<p class="mistake">Please select an age group</p>';
            $dataIsGood = false;
        }

        if($next == ''){
            $errorMessage .= '<p class="mistake">Please enter your email</p>';
            $dataIsGood = false;
        } elseif(!verifyAlphaNum($next)){
            $errorMessage .= '<p class="mistake">Your email contains invalid characters. Please reenter it with appropiate characters</p>';
            $dataIsGood = false;
        }
        
        print '<!-- Starting Saving -->'; 
        if($dataIsGood){
            $sql = 'INSERT INTO tblResponseForm (fldName, fldEmail, fldFiction, fldFantasy, fldMystery, fldNonfiction, fldAge, fldNext) VALUES (?,?,?,?,?,?,?,?)';
            $data =  array($name, $email, $fiction, $fantasy, $mystery, $nonfiction, $age, $next);
            try{ 
                $statement = $pdo->prepare($sql);
                if($statement->execute($data)){
                    $to = $email;
                    $from = "Book Worms Team <sgorgees@uvm.edu>";
                    $subject = "Book Worms Mailing List";
                    $mailMessage= '<p style="font:18px sans serif; color:#48331E">Hello, <br>Thank you for filling out the response form. Our next meeting is on December 8th for the book Play It As It Lays by Joan Didion. Feel free to contact us with any questions you have. <br> Happy Reading!<br>Book Worms Team
                    </p>';
                    $headers="MIME-Version: 1.0\r\nContent-Type: text/html; charset=utf-8\r\nFrom: " . $from . "\r\n";
                    $mailSent = mail($to, $subject, $mailMessage, $headers);
                    if($mailSent){
                        header('Location: https://sgorgees.w3.uvm.edu/cs1080/final/success.php');
                        die();
                    }
                    

                }else{
                    $message = '<p>There was an issue with your form please try again</p>';
                    $dataIsGood = false;
                }
            }catch(PDOException $e){
               $message .= '<p>Couldnt insert the record, please contact us.</p>';
            }
        }
        

    }
?>
       <h2>Response Form</h2>
       <main id="form">
         <!--Where the sections start--> 
            
            <section>
                <h4 class="formSubheader">Want to become a worm? Join our mailing list for relevant updates about Book Worms.</h4>
                <?php
                print $message;
                print $errorMessage;
                ?>
                <form action="#" method="POST">
                    
                        <fieldset>
                            <legend>Mailing List</legend>
                            <p>
                                
                                <label for="txtName">Name: </label>
                                <input type="text" name="txtName" id="txtName" required  value= "<?php print $name; ?>" >
                            </p>

                            <p>
                                <label for="txtEmail">Email: </label>
                                <input type="email" name="txtEmail" id="txtEmail" required value= "<?php print $email; ?>" >
                            </p>
                        </fieldset>

                        <fieldset>
                            <legend>Favorite Genre</legend>
                            <p>
                                <input type="checkbox" id="chkFiction" name="chkFiction" value="1"
                                <?php if($fiction) print 'checked';?> >
                                <label for="chkFiction">Realistic Fiction</label><br>

                                <input type="checkbox" id="chkFantasy" name="chkFantasy" value="1"
                                <?php if($fantasy) print 'checked';?>
                                >
                                <label for="chkFantasy">Fantasty</label><br>

                                <input type="checkbox" id="chkMystery" name="chkMystery" value="1"
                                <?php if($mystery) print 'checked';?> >
                                <label for="chkMystery">Mystery</label><br>
                               
                                <input type="checkbox" id="chkNonfiction" name="chkNonfiction" value="1"
                                <?php if($nonfiction) print 'checked';?> >
                                <label for="chkNonfiction">Nonfiction</label><br>

                            </p>
                        </fieldset>

                        <fieldset>
                            <legend>What is your age group describes you?</legend>
                            <p>
                                <input type="radio" id="btnAge1" name="btnAge" value="-18"
                                <?php if($age == "-18") print 'checked'; ?>
                                required>
                                <label for="btnAge1">&lt;-18</label>
                            </p>
                            <p>  
                                <input type="radio" id="btnAge2" name="btnAge" value="19-30"
                                <?php if($age == "19-30") print 'checked'; ?>
                                required>
                                
                                <label for="btnAge2">19-30</label>
                            </p>  
                            <p>
                                <input type="radio" id="btnAge3" name="btnAge" value="31-50"
                                <?php if($age == "31-50") print 'checked'; ?>
                                required>
                                <label for="btnAge3">31-50</label>
                            </p>
                            <p>
                                <input type="radio" id="btnAge4" name="btnAge" value="51+"
                                <?php if($age == "51+") print 'checked'; ?>
                                required>
                                <label for="btnAge4">51+</label>
                            </p>   
                            
                        </fieldset>
                        <fieldset>
                            <legend>Next Book</legend>
                            <p>
                                What book are you interested in for our next meeting?
                                <label for="txtNext"> </label>
                                <input type="text" name="txtNext" id="txtNext" required  value= "<?php print $next; ?>" >
                            </p>
                        </fieldset>
                            <p class="centered"><input type="submit" name="submit"></p>
                </form>
            </section>

        </main>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>



