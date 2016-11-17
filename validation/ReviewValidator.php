<?php
/**
 * Validator for {@link Review}.
 * @see ReviewMapper
 */
final class ReviewValidator {

    private function __construct() {
    }

    /**
     * Validate the given {@link Review} instance.
     * @param Review $review {@link Review} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(Review $review) {
        $errors = array();
        if (!$review->getCoffeeType()) {
            $errors[] = new Error('coffee_type', 'Empty or invalid Coffee Type');
        }
        if (!$review->getCafeId()) {
            $errors[] = new Error('cafe_id', 'Empty or invalid Cafe.');
        }
        if (!$review->getRating()) {
            $errors[] = new Error('rating', 'Empty or invalid rating.');
        }
        if (!$review->getComment()) {
            $errors[] = new Error('comment', 'Empty or invalid comment.');
        }
        return $errors;
    }

    /**
     * Validate the given status.
     * @param string $status status to be validated
     * @throws Exception if the status is not known
     */
    public static function validateStatus($status) {
        if (!self::isValidStatus($status)) {
            throw new Exception('Unknown status: ' . $status);
        }
    }

    /**
     * Validate the given priority.
     * @param int $priority priority to be validated
     * @throws Exception if the priority is not known
     */
    public static function validatePriority($priority) {
        if (!self::isValidPriority($priority)) {
            throw new Exception('Unknown priority: ' . $priority);
        }
    }

    private static function isValidStatus($status) {
        return in_array($status, Review::allStatuses());
    }

    private static function isValidPriority($priority) {
        return in_array($priority, Review::allPriorities());
    }

}
