Bonjour,

Merci {{ $user->name }} pour votre inscription.<br><br>

Vous pouvez valider votre compte en vous rendant sur le lien <br>
<a>{{ url('auth/confirm', [$user->id, $token]) }}</a><br><br>

Merci.