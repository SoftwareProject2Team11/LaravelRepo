function zoekboek(){
var zoek = document.getElementById('search').value
document.getElementById('result')
console.log(search)
    
    $.ajax({
        url:"https://www.googleapis.com/books/v1/volumes?q=" + zoek,
        dataType:"json",
        success:function(data){
            for(i = 0; i<data.items.length;i++)
                {
                    result.innerHTML+="<br> <br><img src='"+data.items[i].volumeInfo.imageLinks.thumbnail+"'/> <br>"
                    result.innerHTML += "<h3>"+data.items[i].volumeInfo.title + "</h3>"
                    if(data.items[i].searchInfo.textSnippet==null)
					{
					result.innerHTML += "<h3> </h3>"
                    
					}
					else
					{
						result.innerHTML += "<p> Short Description: "+data.items[i].searchInfo.textSnippet+"</p>"
                    
					}
					result.innerHTML += "<p>"+data.items[i].volumeInfo.description +"</p>"
                    if(data.items[i].volumeInfo.pageCount==null||data.items[i].volumeInfo.pageCount==undefined)
					{
					result.innerHTML += "<p> Page Amount: not given </p>"
                    
					}
					else
					{
						result.innerHTML += "<p> Pages: "+data.items[i].volumeInfo.pageCount+"</p>"
                    
					}
					
                    result.innerHTML += "<p> Publisher: "+data.items[i].volumeInfo.publisher +"</p>"
                    result.innerHTML += "<p> Publishing Date: "+data.items[i].volumeInfo.publishedDate +"</p>"
					
                    result.innerHTML+="<p> Language: "+data.items[i].volumeInfo.language+"</p>"
                    result.innerHTML+="<p><a href='"+data.items[i].volumeInfo.previewLink+"'>View / Buy</a></p> <br> <br>"


                    
                    
                    
                }
        },
        type:'GET' 
    });



/*
$(function() {
    $("form input").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $('button[type=submit] .default').click();
            return false;
        } else {
            return true;
        }
    });
});
*/