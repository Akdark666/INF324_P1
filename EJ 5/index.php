<!DOCTYPE html>
<html>
<head>
    <title>CARRERA DE INFORMATICA</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="header">
        <h1>CARRERA DE INFORMATICA</h1>
        <a href="http://www.informatica.edu.bo/">Información de la Carrera</a>
        <a href="http://informatica.umsa.bo/kardex/">Kardex</a>
        <a href="http://instituto.informatica.edu.bo/">Instituto de Investigación</a>

        <a href="login.php">Iniciar sesion</a>

    </div>

    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imgs (1).png" alt="Tecnología 1">
                </div>
                <div class="carousel-item">
                    <img src="imgs (1).jpg" alt="Tecnología 2">
                </div>
                <div class="carousel-item">
                    <img src="imgs (2).jpg" alt="Tecnología 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

        <div class="info-section" id="info_carrera">
            <h2>Carrera de Informática (UMSA)</h2>
            <div class="content">
                <p>La Carrera de Informática en la Universidad Mayor de San Andrés (UMSA) ofrece una sólida formación en ciencias de la computación. Los estudiantes tienen la oportunidad de adquirir conocimientos y habilidades en programación, algoritmos, estructuras de datos, bases de datos, redes, sistemas operativos, inteligencia artificial, entre otros.</p>
                <p>Además, la carrera se enfoca en promover la investigación y el desarrollo de proyectos tecnológicos innovadores. Los estudiantes pueden participar en diversas actividades extracurriculares, conferencias y eventos relacionados con la tecnología, lo que enriquece su experiencia académica y les brinda la oportunidad de estar al tanto de las últimas tendencias en el campo de la informática.</p>
                
                <div class="image-container">
                    <img src="presentacion1.jpg" alt="Imagen de la Carrera de Informática">
                    <span>Edificio de la carrera de informatica</span>
                </div>
            </div>
        </div>

        
        <div class="info-section" id="kardex">
            <h2>Kardex</h2>
            <div class="content">
                <div class="kardex-info">
                    <div class="kardex-text">
                        <p>Tu kardex académico es un registro detallado de tus calificaciones y desempeño en cada curso que has tomado a lo largo de tu carrera. Es una herramienta valiosa para evaluar tu progreso académico y establecer metas futuras.</p>
                    </div>
                    <div class="kardex-image">
                        <img src="presentacion2.jpg" alt="Ejemplo de Kardex">
                    </div>
                </div>
            </div>
        </div>

        



        <div class="info-section" id="instituto_investigacion">
            <h2>Instituto de Investigación</h2>
            <div class="content">
                <div class="instituto-info">
                    <div class="instituto-image">
                        <img src="logo.png" alt="Logo del Instituto de Investigación">
                    </div>
                    <div class="instituto-text">
                        <p>El Instituto de Investigación de nuestra institución es un centro dedicado a la investigación y desarrollo de nuevas tecnologías. Nuestros investigadores trabajan en proyectos innovadores que buscan abordar desafíos tecnológicos actuales y futuros.</p>
                    </div>
                </div>
            </div>
        </div>





    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Configuración para que el carrusel se mueva automáticamente
            $('#myCarousel').carousel({
                interval: 3000 // Cambia la imagen cada 3 segundos
            });
        });
    </script>
</body>
</html>