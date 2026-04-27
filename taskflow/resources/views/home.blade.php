<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Home</title>

    <style>
        .hero {
            background: linear-gradient(120deg, #0d6efd, #6f42c1);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        .section {
            padding: 80px 20px;
        }
    </style>
</head>

<body>

<!-- HERO -->
<header class="hero">
    <h1 class="display-4 fw-bold">Task Flow</h1>
    <p class="lead">Gérez vos tâches simplement et efficacement</p>

    <div class="mt-4">
        <a href="#contenue-home" class="btn btn-light mx-1">Task Flow</a>
        <a href="#fonctionnalite-home" class="btn btn-light mx-1">Fonctionnalités</a>
        <a href="#equipe-home" class="btn btn-light mx-1">Équipe</a>
    </div>

    <div class="mt-3">
        <button class="btn btn-outline-light">Login</button>
        <button class="btn btn-warning">Sign Up</button>
    </div>
</header>

<main>

<!-- SECTION TASK FLOW -->
<section id="contenue-home" class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Task Flow</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Créer une tâche</h5>
                        <p class="card-text">Ajoutez facilement vos tâches quotidiennes.</p>
                        <button class="btn btn-primary btn-sm">Voir</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Organiser</h5>
                        <p class="card-text">Classez vos tâches par priorité.</p>
                        <button class="btn btn-primary btn-sm">Voir</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Suivi</h5>
                        <p class="card-text">Suivez l’avancement de vos projets.</p>
                        <button class="btn btn-primary btn-sm">Voir</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION FONCTIONNALITÉS -->
<section id="fonctionnalite-home" class="section">
    <div class="container">
        <h2 class="text-center mb-5">Fonctionnalités</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5>Rapide</h5>
                        <p>Interface fluide et rapide.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5>Simple</h5>
                        <p>Facile à utiliser pour tout le monde.</p>
                    </div>
                </div>
            </div>
            @y
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5>Collaboratif</h5>
                        <p>Travaillez en équipe efficacement.</p>
                    </div>
                </div>

                
            </div>

        </div>
    </div>
</section>

<!-- SECTION ÉQUIPE -->
<section id="equipe-home" class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Équipe</h2>

        <div class="row g-4">
                @include('layouts.card',['title'=>'azizi mohammed','text'=> 'uha'])
                @include('layouts.card',['title'=>'mokrane yasmine','text'=>'uha'])
                @include('layouts.card',['title'=>'lilia kernou','text'=>'uha'])
                @include('layouts.card',['title'=>'merieme louizini','text'=>'uha'])
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5>Dev 1</h5>
                        <p>Backend Developer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5>Dev 2</h5>
                        <p>Frontend Developer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5>Dev 3</h5>
                        <p>AI Engineer</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

</main>

<footer>
    @include('layouts.footer',[])
</footer>

</body>
</html>