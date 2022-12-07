<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovea - Teste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <h1 class="h2 text-center mt-3">Teste <small class="text-muted">Innovea</small></h1>

        </div>
        <div class="row mt-3 articles">
            <h2 class="h4 text-start text-dark mb-2">Lista de <small class="text-muted">artigos</small></h2>

                 <div class="col-md-10 col-lg-10 col-xl-10 mt-3 erro-articles" style="display:none;">
                    <div class="alert alert-danger" role="alert">
                    Desculpe, não foi possível carregar os artigos.
                    </div>
                </div>  
           
        </div>
    </div>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            
            </ul>
        </footer>
    </div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {  
        
        loadArticles()
    });

    function loadArticles (){
        const url = "https://newsapi.org/v2/everything?q=tesla&from=2022-11-06&pageSize=10&sortBy=publishedAt&apiKey=dae59c50f43141c0b41658c1b5a250d5";

         $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: "json",
                    success: function(response) {
                     
                        if(response){
                            $.each(response.articles, function (e, value) {
                                $('.articles').append(createArticles(value.author, value.content, value.description, value.urlToImage, value.url));
                            });
                        }else{
                            $(".erro-articles").fadeIn();
                        }
                    },
                    error: function() {
                        $(".erro-articles").fadeIn();
                    }
        });
    }     

    function createArticles(author, content, description, urlToImage, url){
        var title = content.substr(0,50)+'...';
        var desc = description.substr(0,100)+'...';

        return '<div class="col-md-6 col-lg-4 col-xl-3">\n' +
        '        <div class="card card-innovea mt-3">\n' +
        '        <img src="' + urlToImage + '" class="card-img-top" alt="...">\n' +
        '        <div class="card-body">\n' +
        '        <h3 class="card-title">' + title + '</h3><br>\n' +
        '        <h4 class="h6 mb-2">Autor: <small class="text-muted">' + author + '</small></h4>\n' +
        '        <p class="card-text">' + desc + '</p>\n' +
        '        <a href="' + url + '" class="btn btn-primary" target="_blank">Ver Artigo</a>\n' +
        '        </div>\n' +
        '        </div>\n' +
        '</div>';
    }
</script>
</body>
</html>