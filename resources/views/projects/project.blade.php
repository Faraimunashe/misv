<x-app-layout>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$project->name}}</h4>
                <p class="card-description"> {{$project->status}} </p>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <p class="font-weight-bold">Purple imc</p>
                      <p> 695 lsom Ave, </p>
                      <p> Suite 00 </p>
                      <p> San Francisco, CA 94107 </p>
                    </address>
                  </div>
                  <div class="col-md-6">
                    <address class="text-primary">
                      <p class="font-weight-bold"> E-mail </p>
                      <p class="mb-2"> johndoe@examplemeail.com </p>
                      <p class="font-weight-bold"> Web Address </p>
                      <p> www.Purple.com </p>
                    </address>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Lead</h4>
                <p class="card-description"> Use class <code>.lead</code>
                </p>
                <p class="lead"> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
              </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">List with icon</h4>
                <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p>
                <ul class="list-arrow">
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Consectetur adipiscing elit</li>
                  <li>Integer molestie lorem at massa</li>
                  <li>Facilisis in pretium nisl aliquet</li>
                  <li>Nulla volutpat aliquam velit&gt;</li>
                </ul>
              </div>
            </div>
          </div>
    </div>
</x-app-layout>
