<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica - Japa Olho Fechado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #003366; /* Azul escuro */
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important; /* Texto branco */
        }
        .footer {
            background-color: #003366; /* Azul escuro */
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            font-size: 30px;
        }
        .hero {
            background: url('https://58b04f5940c1474e557e363a.redesign.static-01.com/l/images/procrastinaC3A7C3A3o-mC3A9dica-young-black-jack1.jpg') no-repeat center center;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Japa Olho Fechado</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/login.php">Login</a> <!-- Redireciona para a página de login -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Bem-vindo à Clínica Oftalmológica Japa Olho Fechado</h1>
        <p>Seu cuidado é nossa prioridade</p>
    </div>

    <div class="container my-5">
        <h2>Sobre Nós</h2>
        <p>A Clínica Oftalmológica Japa Olho Fechado se dedica a proporcionar o melhor atendimento e cuidado aos seus pacientes. Com uma equipe de profissionais altamente qualificados e equipamentos de última geração, garantimos a saúde dos seus olhos com excelência e carinho.</p>
        <p>Contamos com uma variedade de serviços, desde consultas de rotina até cirurgias especializadas. Estamos aqui para ajudar você a enxergar o mundo com clareza!</p>

        <h2>Nossos Médicos</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="https://58b04f5940c1474e557e363a.redesign.static-01.com/l/images/procrastinaC3A7C3A3o-mC3A9dica-young-black-jack1.jpg" alt="Médico 1" class="img-fluid rounded">
                <h5>Dr. João Silva</h5>
                <p>Oftalmologista especializado em cirurgia refrativa.</p>
            </div>
            <div class="col-md-6">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtjPmI7GTCjRjNknaveedWeZcFuwwYY5yMaw&s" alt="Médico 2" class="img-fluid rounded">
                <h5>Dra. Maria Oliveira</h5>
                <p>Especialista em retina e diagnóstico de doenças oculares.</p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>Contato: <a href="mailto:japinhaKokimoto@gmail.com" class="text-white">japinhaKokimoto@gmail.com</a></p>
        <p>Instagram: <a href="https://www.instagram.com/japaPastel_flango" class="text-white">@japaPastel_flango</a></p>
        <p>Endereço: Rua das Flores, 123 - São Paulo, SP</p>
        <p>Telefone: <a href="tel:400028922" class="text-white">4000-28922</a></p>
    </footer>

    <a href="https://wa.me/400028922" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
