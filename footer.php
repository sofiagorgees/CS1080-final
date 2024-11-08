
<footer>
    
    <aside class="socialBar">
            <a href="https://time.com/4547332/reading-benefits/" target=”_blank” class="socials"><img src="final-images/fb.png" alt="facebook icon"></a>
            <a href="https://time.com/4547332/reading-benefits/" target=”_blank” class="socials"><img src="final-images/insta.png" alt="instagram icon"></a>
            <a href="https://time.com/4547332/reading-benefits/" target=”_blank” class="socials"><img src="final-images/ms.png" alt="my space icon"></a>
            <a href="https://time.com/4547332/reading-benefits/" target=”_blank” class="socials"><img src="final-images/yt.png" alt="youtube icon"></a>
    </aside>
    <p id="footerText">
        Created By Sofia Gorgees - <a href="../sitemap.php">Site Map</a> 
    </p>
    <p id="questionButtonText"> Any questions or concerns? Please feel free to email our support team: books4lyfe@bookworm.net</p>
    <button id="questionButton"><img src="final-images/questionMark.png" alt="question mark">
    </button>
    <script>
    function show(){
        let questionButtonText = document.getElementById("questionButtonText");
        if(questionButtonText.style.display=="block"){
            questionButtonText.style.display="none";
        } else {
            questionButtonText.style.display="block";
        }
    }
    let questionButton = document.getElementById("questionButton");
    questionButton.addEventListener("click", show);
    console.log("button");
</script>
    
</footer>