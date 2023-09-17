<link rel="stylesheet" href="{{ asset('backoffice/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    
    .header{
        border-bottom: 1px solid;
        top: 0;
        width: 100%;
    }

    .nav{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .btn-link{
        color: black;
        text-decoration: none;
    }
    .btn-link:hover,.btn-link:active {
        color: black;
    }
    .section__02{
        margin: 60px;
    }
    .card{
        width: 100%;
    }
    .card-details{
       padding:20px;
    }
    .card-details .title{
        font-size: 15px;
        font-weight: 400;
    }
    .card-details .author{
        font-size: 15px;
        font-weight: 400;
    }
    
    .card__header img {
        height: 300px;
        object-fit: cover;
        background-position: center;
    }
    
    .oswald-font {
        font-family: 'Oswald', sans-serif !important;
    }
    
    .roboto-font {
        font-family: 'Roboto', sans-serif !important;
    }
    
    .roboto-font {
        font-family: 'Roboto', sans-serif !important;
    }
    .oswald-font-300 {
        font-family: 'Oswald', sans-serif !important;
        font-weight: 300;
    }
    .oswald-font-400 {
        font-family: 'Oswald', sans-serif !important;
        font-weight: 400;
    }
     .oswald-font-500  {
        font-family: 'Oswald', sans-serif !important;
        font-weight: 500;
    }
     .oswald-font-600  {
        font-family: 'Oswald', sans-serif !important;
        font-weight: 600;
    }
     .oswald-font-700  {
        font-family: 'Oswald', sans-serif !important;
        font-weight: 700;
    }
    .card__container .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .bg-image {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top center;
        margin-top: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 400px;
        position: relative;
        overflow: hidden;
    }
    
    .bg-overlay {
        height: 100%;
        width: 100%;
        background-color: rgba(0,0,0,.5);
        position:absolute;
        z-index:9;
    }
    
    .text-container {
        z-index: 9;
    }
</style>