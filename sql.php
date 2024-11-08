<?php
include 'top.php';
?>
<main>
    <p>Create Table SQL</p>
<pre>
CREATE TABLE archiveData(
    pmkMaterialsID INT AUTO_INCREMENT PRIMARY KEY,
    fldTitle VARCHAR(100),
    fldAuthor VARCHAR(100),
    fldGenre VARCHAR(100),
    fldPgs INT,
    fldRating VARCHAR(10)

)
INSERT INTO archiveData (fldTitle, fldAuthor, fldGenre,fldPgs, fldRating) VALUES
    ("East of Eden","John Steinback","Fiction",704,"5/5"),
    ("Beloved","Toni Morrison","Historical Fiction",245,"4.25/5"),
    ("Into the Wild","Jon Krakauer","Nonfiction",203,"3.5/5"),
    ("Slaughterhouse-Five","Kurt Vonnegut","Fiction",275,"3.75/5"),
    ("The Underground Railroad","Colson Whitehead","Historical Fiction",320,"4/5"),
    ("Brave New World","Aldous Huxley","Science Fiction",288,"3.75/5"),
    ("Gone Girl","Gillian Flynn","Mystery",456,"4/5"),
    ("The Bell Jar","Sylvia Plath","Fiction",294,"3.5/5"),
    ("The Metamorphosis","Franz Kafka","Fiction",64,"3.75/5"),
    ("Girl, Interrupted","Susanna Kaysen","Memoir",169,"3.5/5")


CREATE TABLE tblResponseForm(
    pmkInterestId INT AUTO_INCREMENT PRIMARY KEY,
    fldName VARCHAR(50),
    fldEmail VARCHAR(50),
    fldFiction TINYINT(1) DEFAULT 0,
    fldFantasy TINYINT(1) DEFAULT 0,
    fldMystery TINYINT(1) DEFAULT 0,
    fldNonfiction TINYINT(1) DEFAULT 0,
    fldAge VARCHAR(6),
    fldNext VARCHAR(100)
)    

INSERT INTO tblResponseForm (pmkInterestId, fldName, fldEmail, fldFiction, fldFantasy, fldMystery, fldNonfiction, fldAge, fldNext)
VALUES (1, "Jack", "email@email.gov", 0, 1 , 0, 0, "-18", "Siddartha"); 
</pre>

</main>
<?php
include 'footer.php';
?>
</body>
</html>