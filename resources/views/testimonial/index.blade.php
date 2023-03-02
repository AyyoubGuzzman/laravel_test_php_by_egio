<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">  
    <title>Add Testimonial</title>
</head>
<body>
    <div>
        
        <div id="dash">
            <a href="/dashboard"><button id="btn-dash">Gestion</button></a>
        </div>
        @if ($errors->any())
        
            <div class="danger">
            <p><strong>try to fix these errors to fix :</strong></p>
                @foreach ($errors->all() as $error )
                        <li class="error">{{ $error }}</li>
                @endforeach
            </div>

        @elseif (session('success'))
        <div class="success">
            <p><strong>{{ session('success') }}</strong></p>  
        </div>
        @endif
        <div id="center">
            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf

                <label for="Titre">Titre</label>
                <input type="text" id="titre" name="Titre" />

                <label for="Doc">Photo</label>
                <input type="file" id="doc" name="Doc" />

                <label for="Message">Message</label>
                <textarea rows="8" id="message" name="Message"></textarea>
                <div id="btn">
                    <button id="add" type="submit">Add new testimonial</button>
                </div>
            </form>
        </div>

        <h1>Testimonials</h1>

        <div id="list">
            @foreach ($testimonial as $t )
                    <div class="card" draggable="true">
                        <img class="image" width="200px" src="{{ asset('storage/Docs/'. $t['Doc']) }}" alt="">
                        <h3 class="titel">{{ $t['Titre'] }}</h3>
                        <p class="message">{{ $t['Message'] }}</p>
                    </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script>
        const dragArea = document.querySelector('#list')
        new Sortable(dragArea,{
            animation : 300
        })
    </script>

</body>
</html>