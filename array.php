<?php
include 'top.php';
?>
        <h2>Past Book Archive</h2>
        <main id="archive">
         <!--Where the sections start--> 
            <section class="homeSection">
                <h3 class="subheader">
                    Last Weeks Read: East of Eden by John Steinback
                </h3>
                <p><img id="eastCover" src="final-images/eastofedencover.jpg" alt="East Of Eden by John Steinback Book Cover"></p>
                <p>
                   Last week Book Worms read East of Eden and we gave it 5/5 star rating. Written by John Steinback who is most well known for the novella 'Of Mice and Men', East of Eden tells a generational story of two families whose lives provide a parallel to Book of Genesis. The overall consensus was that this book tells an incredible tale of about love, destruction, longing, family, and friendship. Notable thoughts by our members were that the work transcended the average historical fiction. It offers complex and real characters that were lovable and human. This generational novel while long is incredibly readable and debatably (and according to some of our members definitely) a book that everyone has to read in their lifetime. The support that this novel got by Book Worms was resounding and it was definetly ranks for one of Book Worms' favorite book.
                   Another glorious piece of work by Steinback!
                </p>
            </section>

            <section>
               <!--table -->
               <h3>Archive</h3>
                <p>Have you ever wondered what Book Worms has read in the past? Well look no further, below is a table of all the books that Book Worms has read along with the average rating that other members gave the book. After every meeting we add the old book to this archive and start a new one. If you have free time (because you already read the book of the week) we recommend that you pick up one of these for an interesting read. Tap on any book that interests you to see the front cover, Happy reading!</p>
                <table>
                        <tr class="headTableRow">  <th>Title</th> <th>Author</th> <th>Genre</th><th>Pages</th><th>Rating</th> </tr>
                        <?php
                        $tableImgNum = 0;
                        $sql = 'SELECT fldTitle, fldAuthor, fldGenre, fldPgs, fldRating FROM archiveData';
                        $statement = $pdo->prepare($sql);
                        $statement->execute();

                        $records = $statement->fetchAll();

                        foreach($records as $record) {
                            $tableImgNum = $tableImgNum + 1;
                            print '<tr id = "tableImg' . $tableImgNum . '" >';
                            print '<td>' . $record['fldTitle'] . '</td>';
                            print '<td>' . $record['fldAuthor'] . '</td>';
                            print '<td>' . $record['fldGenre'] . '</td>';
                            print '<td>' . $record['fldPgs'] . '</td>';
                            print '<td>' . $record['fldRating'] . '</td>';
                            print '</tr>' . PHP_EOL;
                            }
                        ?>
                    </table>
                    <aside id="spotlightBg">
                    <img id="spotlightImg" src="final-images/tableImg1" alt="book cover">
                    <button id="closeButton">X</button>
                    <p id="caption"></p>
                    </aside>
                    <script>
                    let spotlight = document.getElementById("spotlightBg");
                    let spotlightImg = document.getElementById("spotlightImg");
                    let captionText = document.getElementById("caption");
                    let row1 = document.getElementById("tableImg1");
                    let row2 = document.getElementById("tableImg2");
                    let row3 = document.getElementById("tableImg3");
                    let row4 = document.getElementById("tableImg4");
                    let row5 = document.getElementById("tableImg5");
                    let row6 = document.getElementById("tableImg6");
                    let row7 = document.getElementById("tableImg7");
                    let row8 = document.getElementById("tableImg8");
                    let row9 = document.getElementById("tableImg9");
                    let row10 = document.getElementById("tableImg10");
                   
                    row1.addEventListener("click", function(){bookCoverSpotlight("tableImg1","East Of Eden - John Steinback");});
                    row2.addEventListener("click", function(){bookCoverSpotlight("tableImg2","Beloved - Toni Morrison");});
                    row3.addEventListener("click", function(){bookCoverSpotlight("tableImg3","Into the Wild - Jon Krakauer");});
                    row4.addEventListener("click", function(){bookCoverSpotlight("tableImg4","Slaughterhouse-Five - Kurt Vonnegut");});
                    row5.addEventListener("click", function(){bookCoverSpotlight("tableImg5","The Underground Railroad - Colson Whitehead");});
                    row6.addEventListener("click", function(){bookCoverSpotlight("tableImg6","Brave New World Aldous Huxely");});
                    row7.addEventListener("click", function(){bookCoverSpotlight("tableImg7","Gone Girl - Gillian Flynn");});
                    row8.addEventListener("click", function(){bookCoverSpotlight("tableImg8","The Bell Jar - Sylvia Plath");});
                    row9.addEventListener("click", function(){bookCoverSpotlight("tableImg9","The Metamorphosis - Franz Kafka");});
                    row10.addEventListener("click", function(){bookCoverSpotlight("tableImg10","Girl, Interrupted - Susanna Kaysen");});
                    function bookCoverSpotlight(book,text){
                        spotlight.style.display="block";
                        spotlightImg.src = "final-images/"+book+".jpg";
                        captionText.innerHTML = text;
                    }
                    var close = document.getElementById("closeButton");
                    close.onclick = function() {
                        spotlight.style.display = "none";
                    }
                    </script>
            </section>
        </main>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>




