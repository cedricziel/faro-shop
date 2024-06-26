<?php

use App\Kernel;
use Doctrine\ORM\EntityRepository;
use OpenTelemetry\API\Instrumentation\CachedInstrumentation;
use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\StatusCode;
use OpenTelemetry\Context\Context;
use OpenTelemetry\SemConv\TraceAttributes;
use function OpenTelemetry\Instrumentation\hook;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

$instrumentation = new CachedInstrumentation('io.opentelemetry.contrib.php.doctrine');

if (!function_exists('hookController')) {
    function hookController(CachedInstrumentation $instrumentation, string $class, string $hookedMethod)
    {
        hook(
            $class,
            $hookedMethod,
            pre: static function (
                object $controller,
                array  $params,
                string $class,
                string $function,
                ?string $filename,
                ?int    $lineno,
            ) use ($instrumentation) {
                $builder = $instrumentation
                    ->tracer()->spanBuilder(sprintf('%s::%s', $class, $function));

                $span = $builder->startSpan();
                $parent = Context::getCurrent();

                Context::storage()->attach($span->storeInContext($parent));
            },
            post: static function (
                object $controller,
                array  $params,
                mixed  $result,
                ?\Throwable $exception
            ) {
                $scope = Context::storage()->scope();
                if (null === $scope) {
                    return;
                }
                $scope->detach();
                $span = Span::fromContext($scope->context());

                if (null !== $exception) {
                    $span->recordException($exception, [
                        TraceAttributes::EXCEPTION_ESCAPED => true,
                    ]);
                    $span->setStatus(StatusCode::STATUS_ERROR, $exception->getMessage());
                }

                $span->end();
            },
        );
    }
}

if (!function_exists('hookRepoMethod')) {
    function hookRepoMethod(CachedInstrumentation $instrumentation, $hookedMethod)
    {
        hook(
            EntityRepository::class,
            $hookedMethod,
            pre: static function (
                EntityRepository $entityRepository,
                array            $params,
                string           $class,
                string           $function,
                ?string          $filename,
                ?int             $lineno,
            ) use ($instrumentation) {
                $builder = $instrumentation
                    ->tracer()->spanBuilder(sprintf('%s::%s', $entityRepository::class, $function));

                $span = $builder->startSpan();
                $parent = Context::getCurrent();

                Context::storage()->attach($span->storeInContext($parent));
            },
            post: static function (
                EntityRepository $entityRepository,
                array            $params,
                                 $result,
                ?\Throwable      $exception
            ) {
                $scope = Context::storage()->scope();
                if (null === $scope) {
                    return;
                }
                $scope->detach();
                $span = Span::fromContext($scope->context());

                if (null !== $exception) {
                    $span->recordException($exception, [
                        TraceAttributes::EXCEPTION_ESCAPED => true,
                    ]);
                    $span->setStatus(StatusCode::STATUS_ERROR, $exception->getMessage());
                }

                $span->end();
            },
        );
    }

}

hookRepoMethod($instrumentation, 'find');
hookRepoMethod($instrumentation, 'findOne');
hookRepoMethod($instrumentation, 'findBy');
hookRepoMethod($instrumentation, 'findOneBy');
hookRepoMethod($instrumentation, 'findAdvertised');
hookRepoMethod($instrumentation, 'findRelated');

hookController($instrumentation, \App\Controller\CartController::class, 'index');
hookController($instrumentation, \App\Controller\CheckoutController::class, 'index');
hookController($instrumentation, \App\Controller\CheckoutController::class, 'failed');
hookController($instrumentation, \App\Controller\CheckoutController::class, 'success');
hookController($instrumentation, \App\Controller\HomeController::class, 'index');
hookController($instrumentation, \App\Controller\ProductController::class, 'detail');

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool)$context['APP_DEBUG']);
};
