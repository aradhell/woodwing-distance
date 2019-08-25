<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Exception $e
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $e)
    {
        $rendered = parent::render($request, $e);

        if($rendered instanceof JsonResponse) {
            return $rendered;
        }

        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        $message = "Server Error";
        $error = "";

        if ($e instanceof HttpResponseException) {
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = 'HTTP_INTERNAL_SERVER_ERROR';
        } elseif ($e instanceof MethodNotAllowedHttpException) {
            $status = Response::HTTP_METHOD_NOT_ALLOWED;
            $message = 'HTTP_METHOD_NOT_ALLOWED';
        } elseif ($e instanceof NotFoundHttpException) {
            $status = Response::HTTP_NOT_FOUND;
            $message = 'HTTP_NOT_FOUND';
        } elseif ($e instanceof AuthorizationException) {
            $status = Response::HTTP_FORBIDDEN;
            $message = 'HTTP_FORBIDDEN';
        } elseif ($e instanceof ValidationException && $e->getResponse()) {
            $status = Response::HTTP_BAD_REQUEST;
            $error = $e->getResponse()->getData();
            $message = 'HTTP_BAD_REQUEST';
        } elseif ($e instanceof InvalidUnitException) {
            $status = Response::HTTP_UNPROCESSABLE_ENTITY;
            $message = 'Invalid unit type';
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'error' => $error,
        ], $status);
    }
}
