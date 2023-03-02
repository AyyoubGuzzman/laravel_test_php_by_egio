<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>dashboard</title>
</head>
<body>
    <div class="content">
        <div id="List">
            <a href="/"><button id="btn-list">Back to list</button></a>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th width="90px">Photo</th>
                    <th width="90px">Titre</th>
                    <th>Message</th>
                    <th width="90px">Etat</th>
                    <th width="40px"></th>
                </tr>
            </thead>
            @foreach ($testimonial as $t)
                <tr>
                    <td><img class="image" width="40px" src="{{ asset('storage/Docs/'. $t['Doc']) }}" ></td>
                    <td>{{ $t['Titre'] }}</td>
                    <td>{{ $t['Message'] }}</td>
                    <td>
                        @if ($t['Etat'] == 'Approuved')
                            <div id="approuved"><strong>Approuved</strong></div>
                        @elseif ($t['Etat'] == 'Rejected')
                            <div id="rejected"><strong>Rejected</strong></div>
                        @else
                            <div id="pendding"><strong>Pendding</strong></div>
                        @endif
                        
                    
                    
                    
                    </td>
                    <td>
                        <a id="edit" href="{{ route('testimonial.edit', $t['id']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

  
</body>
</html>