<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shorterner</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">URL Shorterner</a>
      </div>
    </nav>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h2 class="text-center font-weight-bold-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
              <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
              <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
            </svg>
          Short your link
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
            <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
            <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
          </svg></h2>
          <p class="text-center">The easiest and simplest way to shorten your urls and make them more accessible</p>
          <div class="card shadow mb-5">
            <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger mb-3 pb-0">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                @elseif($message = Session::get('success'))
                  <div class="alert alert-success mb-3 pb-0">
                    <ul>
                      <li>{{ $message }}</li>
                    </ul>
                  </div>
                @endif
              <div>
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <input
                        placeholder="Input your link here"
                        value="{{ session('request') }}"
                        type="url"
                        class="form-control"
                        name="source"
                      />
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        @if (session('result'))
            <h6 class="mb-3">Copy your shortlink here</h6>
            <div class="card shadow">
                <div class="card-body">
                  <div class="input-group mb-3">
                    <input
                    id = "copy"
                    value="{{ session('result') }}"
                    type="url"
                    readonly
                    class="form-control"
                    />
                  <div class="input-group-append">
                    <button class="btn" style="background-color:transparent" title="Copy to clipboard!" onclick="copyContent()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"></path>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <script>
                let text = document.getElementById('copy').value;
                const copyContent = async () => {
                  try {
                    await navigator.clipboard.writeText(text);
                    console.log('Content copied to clipboard');
                  } catch (err) {
                    console.error('Failed to copy: ', err);
                  }
                }
              </script>
            </div>
        @endif
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
  <footer style="position: fixed; height: 50px; bottom: 0; width: 100%; background-color: #d3d3d3; padding-top: 15px" id="footer" class="text text-center">
    <p> Developed with &#10084;&#65039; by Farhan kurnia </p>
  </footer>
</html>