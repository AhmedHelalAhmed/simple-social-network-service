<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException as AccessDeniedHttpException;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => trans('messages.model_error_1').str_replace('App\\', '', $exception->getModel()).trans('messages.model_error_2')], 404);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'error' => trans('messages.error_authorization')], 401);
        }

        if ($exception instanceof AccessDeniedHttpException)
        {
            return response()->json([
                'code' => 403,
                'message' => trans('messages.error_authorization_action'),
            ],403);
        }

        if ($exception instanceof NotFoundHttpException)
        {
            return response()->json([
                'code' => 403,
                'message' => trans('messages.error_authorization_action'),
            ],403);
        }
        return parent::render($request, $exception);
    }
}
