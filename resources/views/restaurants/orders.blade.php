@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.profile')
<div class="table-responsive">
    <table class="table align-items-center table-dark">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Food name</th>
            <th scope="col">quantity</th>
            <th scope="col">price</th>
            <th scope="col">delivery address</th>
            <th scope="col">city</th>
            <th scope="col">phone number</th>
            <th scope="col</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg">
                    </a>
                    <div class="media-body">
                        <span class="mb-0 text-sm">Argon Design System</span>
                    </div>
                </div>
            </th>
            <td>
                $2,500 USD
            </td>
            <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-warning"></i> pending
                </span>
            </td>
            <td>
                <div class="avatar-group">
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
      <img alt="Image placeholder" src="../../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
      <img alt="Image placeholder" src="../../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
      <img alt="Image placeholder" src="../../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
  </a>
</div>

            </td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="mr-2">60%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/angular.jpg">
                    </a>
                    <div class="media-body">
                        <span class="mb-0 text-sm">Angular Now UI Kit PRO</span>
                    </div>
                </div>
            </th>
            <td>
                $1,800 USD
            </td>
            <td>
                <span class="badge badge-dot">
                  <i class="bg-success"></i> completed
                </span>
            </td>
            <td>
                <div class="avatar-group">
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
      <img alt="Image placeholder" src="../../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
      <img alt="Image placeholder" src="../../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
      <img alt="Image placeholder" src="../../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
  </a>
</div>

            </td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="mr-2">100%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/sketch.jpg">
                    </a>
                    <div class="media-body">
                        <span class="mb-0 text-sm">Black Dashboard</span>
                    </div>
                </div>
            </th>
            <td>
                $3,150 USD
            </td>
            <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-danger"></i> delayed
                </span>
            </td>
            <td>
                <div class="avatar-group">
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
      <img alt="Image placeholder" src="../../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
      <img alt="Image placeholder" src="../../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
      <img alt="Image placeholder" src="../../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
  </a>
</div>

            </td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="mr-2">72%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/react.jpg">
                    </a>
                    <div class="media-body">
                        <span class="mb-0 text-sm">React Material Dashboard</span>
                    </div>
                </div>
            </th>
            <td>
                $4,400 USD
            </td>
            <td>
                <span class="badge badge-dot">
                  <i class="bg-info"></i> on schedule
                </span>
            </td>
            <td>
                <div class="avatar-group">
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
      <img alt="Image placeholder" src="../../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
      <img alt="Image placeholder" src="../../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
      <img alt="Image placeholder" src="../../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
  </a>
</div>

            </td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="mr-2">90%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/vue.jpg">
                    </a>
                    <div class="media-body">
                        <span class="mb-0 text-sm">Vue Paper UI Kit PRO</span>
                    </div>
                </div>
            </th>
            <td>
                $2,200 USD
            </td>
            <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-success"></i> completed
                </span>
            </td>
            <td>
                <div class="avatar-group">
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
      <img alt="Image placeholder" src="../../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
      <img alt="Image placeholder" src="../../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
      <img alt="Image placeholder" src="../../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
  </a>
    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
  </a>
</div>

            </td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="mr-2">100%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>

</div>
@endsection