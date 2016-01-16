Hey! A TFTF user sent a message to a business!

<ul>
    <li>User: {{ link_to_route('user.show', $user->name, $user) }}</li>
    <li>Business: {{ link_to_route('business.show', $business->name, $business) }}</li>
    <li>Messagee: {!! link_to_route('business.message.show', 'View Message', $message) !!}</li>
</ul>