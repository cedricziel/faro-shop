<?php

use App\Kernel;
use App\O11y\OpenTelemetryStamp;
use Doctrine\ORM\EntityRepository;
use OpenTelemetry\API\Globals;
use OpenTelemetry\API\Instrumentation\CachedInstrumentation;
use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\SpanKind;
use OpenTelemetry\API\Trace\StatusCode;
use OpenTelemetry\Context\Context;
use OpenTelemetry\Context\Propagation\ArrayAccessGetterSetter;
use OpenTelemetry\SemConv\TraceAttributes;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Sender\SenderInterface;
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

hook(
    SenderInterface::class,
    'send',
    pre: static function (
        SenderInterface $sender,
        array  $params,
        string $class,
        string $function,
        ?string $filename,
        ?int    $lineno,
    ) use ($instrumentation) {
        /** @var Envelope $envelope */
        $envelope = $params[0];

        $builder = $instrumentation
            ->tracer()->spanBuilder(sprintf('%s::%s', $class, $function))
            ->setSpanKind(SpanKind::KIND_PRODUCER)
            ->setAttribute(TraceAttributes::MESSAGING_SYSTEM, 'amqp')
            ->setAttribute(TraceAttributes::MESSAGING_DESTINATION, 'amqp')
            ->setAttribute(TraceAttributes::MESSAGING_DESTINATION_KIND, 'queue')
            ->setAttribute(TraceAttributes::MESSAGING_OPERATION, 'send')
            ->setAttribute(TraceAttributes::PEER_SERVICE, 'amqp')
        ;

        $span = $builder->startSpan();
        $parent = Context::getCurrent();

        $context = $span->storeInContext($parent);

        $openTelemetryStamp = new OpenTelemetryStamp();
        $propagator = Globals::propagator();
        $propagator->inject($openTelemetryStamp, ArrayAccessGetterSetter::getInstance(), $context);
        $envelope = $envelope->with($openTelemetryStamp);

        Context::storage()->attach($context);

        return [$envelope];
    },
    post: static function (
        SenderInterface $sender,
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
