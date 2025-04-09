<x-mail::message>
# Informations sur l'expediteur
- Nom : {{$datas["nom"]}}
- Email : {{$datas["email"]}}


The body of your message.

{{$datas["message"]}}

</x-mail::message>