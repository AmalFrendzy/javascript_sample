<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <button id="populate" class="btn btn-success m-5">Populate Data</button>
    <table class="table table-success mr-3">
        <thead class="table table-dark">
            <tr>
                <td>ID</td>
                <td>name</td>
                <td>username</td>
                <td>email</td>
            </tr>
        </thead>
        <tbody id="text_area">
            <tr>
                <td>please wait...</td>
            </tr> 
        </tbody>
    </table>
    <script>
        var xhr=new XMLHttpRequest();
        xhr.open("get","https://jsonplaceholder.typicode.com/users");   
        // xhr.send();
        document.getElementById("populate").addEventListener("click",function(){
            xhr.send();
        })
        xhr.onreadystatechange =function(){
            // console.log(xhr.readyState);
            if(xhr.readyState== 4){
                if(xhr.status ==200){
                    var result_data=JSON.parse(xhr.response)
                    var html_content="";
                    for(i=0;i<result_data.length;++i){
                        var current_record=result_data[i];
                        html_content=html_content+"<tr><td>"+current_record.id+"</td>  <td>"+current_record.name+"</td>  <td>"+current_record.username+"</td> <td>"+current_record.email+"</td></tr>";
                    }
                    document.getElementById("text_area").innerHTML =html_content;
                }else{
                    alert("error");
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</body>
</html>