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
        <div id="form">
            <form action="{{ route('testimonial.update', $testimonial) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <label for="etat">Etat</label>
                <select name="Etat" id="etat">
                    <option value="Approuved">Approuved</option>
                    <option value="pendding">pendding</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <div id="btn">
                    <button id="update" type="submit">Add new testimonial</button>
                </div>
                
            </form>
            <div id="btn">
                <a href="/dashboard"><button id="cancel">Cancel</button></a>
            </div>
        </div>

    </div>
</body>
</html>