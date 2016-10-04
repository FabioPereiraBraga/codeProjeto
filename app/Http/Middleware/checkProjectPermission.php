<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Service\ProjectService;

class checkProjectPermission
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $projectId = $request->route('id') ? $request->route('id') : $request->route('project');

        if($this->service->checkProjectPermission($projectId) == false){
            return['error'=>'You have\'t permission to access project'];
        }


        return $next($request);
    }
}
