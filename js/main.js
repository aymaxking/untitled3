function fn() {
    // Declare variables
    var input, filter, titles, t, articles, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    titles = document.getElementsByClassName("article_title");
    articles = document.getElementsByClassName('article_content');
        for (i = 0; i < titles.length; i++)
    {
        t = titles[i];
        txtValue = t.innerHTML;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            articles[i].style.display = "";
        } else {
            articles[i].style.display = "none";
        }
    }
}


function addtoSession(souscategoryid){
    localStorage.setItem('souscategoryid',souscategoryid);
}