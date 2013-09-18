;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |6|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;; quadratic-root : Number Number Number -> Number
;; GIVEN: 3 numbers.
;; RETURNS: The number as a quadratic-root.
;; Examples:
;;(quadratic-root 4 2 3)  => #i0.25-0.82915619758885i
;;(quadratic-root 1 2 3)  => #i1.0-1.4142135623730951i

(define (quadratic-root a b c)
  (/(- b(sqrt(-(* b b)(* 4 a c))))(* 2 a)))

(quadratic-root 1 2 3)
;;Test:
(check-within (quadratic-root 1 2 3) 1.0-1.4142135623730951i 0.1)
