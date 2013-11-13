<?php

namespace React\EventLoop;

use React\EventLoop\Timer\TimerInterface;

interface LoopInterface
{
    /**
     * Register a listener to be notified when a stream is ready to read.
     *
     * @param stream   $stream   The PHP stream resource to check.
     * @param callable $listener Invoked when the stream is ready.
     */
    public function addReadStream($stream, $listener);

    /**
     * Register a listener to be notified when a stream is ready to write.
     *
     * @param stream   $stream   The PHP stream resource to check.
     * @param callable $listener Invoked when the stream is ready.
     */
    public function addWriteStream($stream, $listener);

    /**
     * Remove the read event listener for the given stream.
     *
     * @param stream $stream The PHP stream resource.
     */
    public function removeReadStream($stream);

    /**
     * Remove the write event listener for the given stream.
     *
     * @param stream $stream The PHP stream resource.
     */
    public function removeWriteStream($stream);

    /**
     * Remove all listeners for the given stream.
     *
     * @param stream $stream The PHP stream resource.
     */
    public function removeStream($stream);

    /**
     * Enqueue a callback to be invoked once after the given interval.
     *
     * The execution order of timers scheduled to execute at the same time is
     * not guaranteed.
     *
     * @param numeric  $interval The number of seconds to wait before execution.
     * @param callable $callback The callback to invoke.
     *
     * @return TimerInterface
     */
    public function addTimer($interval, $callback);

    /**
     * Enqueue a callback to be invoked repeatedly after the given interval.
     *
     * The execution order of timers scheduled to execute at the same time is
     * not guaranteed.
     *
     * @param numeric  $interval The number of seconds to wait before execution.
     * @param callable $callback The callback to invoke.
     *
     * @return TimerInterface
     */
    public function addPeriodicTimer($interval, $callback);

    /**
     * Cancel a pending timer.
     *
     * @param TimerInterface $timer The timer to cancel.
     */
    public function cancelTimer(TimerInterface $timer);

    /**
     * Check if a given timer is active.
     *
     * @param TimerInterface $timer The timer to check.
     *
     * @return boolean True if the timer is still enqueued for execution.
     */
    public function isTimerActive(TimerInterface $timer);

    /**
     * Perform a single iteration of the event loop.
     */
    public function tick();

    /**
     * Run the event loop until there are no more tasks to perform.
     */
    public function run();

    /**
     * Instruct a running event loop to stop.
     */
    public function stop();
}
