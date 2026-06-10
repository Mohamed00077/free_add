 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Inscription</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf
                            
                            <!-- Login -->
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" value="{{ old('login') }}">
                                @error('login')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Téléphone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmation Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Déjà un compte ? Se connecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


 
