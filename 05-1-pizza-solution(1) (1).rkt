;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-intermediate-lambda-reader.ss" "lang")((modname |05-1-pizza-solution(1) (1)|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;; solutions to Guided Practice 5.1: pizza problem

(require rackunit)
(require rackunit/text-ui)

;; Data Definitions:

(define-struct topped-pizza (topping base))
;A topped-pizza is a make-topped-pizza Topping Pizza
;Interp : A Topping is a String.

;A Pizza is either
;
;-- the string "plain crust"
;-- (make-topped-pizza
;       Topping Pizza)
;
;Interp:
;"plain crust" means a pizza with no toppings
;(make-topped-pizza t p) represents the pizza p with topping t added on top.

;pizza-fn : Pizza -> ??
;(define (pizza-fn p)
;  (cond
;    [(plain-pizza? p)
;     ...]
;    [else 
;     (... 
;      (topped-pizza-
;        topping p)
;      (pizza-fn
;       (topped-pizza-base
;         p)))]))



(define (plain-pizza? p)
  (if (string? p) (string=? p "plain crust") false)) 
(define cheese-pizza (list "cheese"))
(define anchovies-cheese-pizza (list "anchovies" "cheese"))

;;; This is the original function definition, from the slides:

;; replace-all-anchovies-with-onions 
;;   : Pizza -> Pizza
;; Returns a pizza like the given pizza, but with
;; anchovies in place of each layer of onions
;; STRATEGY: Structural decomposition on p : Pizza
(define (replace-all-anchovies-with-onions p)
  (cond 
    [(plain-pizza? p) "plain crust"]
    [else (if (string=? (topped-pizza-topping p) "anchovies")
              (make-topped-pizza "onions" (replace-all-anchovies-with-onions (topped-pizza-base p)))
              (make-topped-pizza (topped-pizza-topping p) (replace-all-anchovies-with-onions (topped-pizza-base p))))]))
     
(define-test-suite example-tests
  (check-equal? (replace-all-anchovies-with-onions (make-topped-pizza "anchovies" (make-topped-pizza "onions" "plain crust")))
                                                   (make-topped-pizza "onions" (make-topped-pizza "onions" "plain crust"))))

(run-tests example-tests)

;; replace-all-anchovies : Pizza Topping -> Pizza
;; Returns a pizza like the given pizza, but with 
;; all anchovies replaced by the given topping.
;; STRATEGY: Structural decomposition on p : Pizza
(define (replace-all-anchovies p replacement)
  (cond
    [(plain-pizza? p) "plain crust"]
    [else (if (string=? (topped-pizza-topping p) "anchovies")
            (make-topped-pizza replacement
              (replace-all-anchovies (topped-pizza-base p) replacement))
            (make-topped-pizza (topped-pizza-topping p)
              (replace-all-anchovies (topped-pizza-base p) replacement)))]))




;; replace-topping : Pizza Topping Topping -> Pizza
;; GIVEN: a pizza and two toppings
;; RETURNS: a pizza like the given one, but with 
;; all instances of the first topping replaced by
;; the second one.
;; STRATEGY: Structural decomposition on p : Pizza
(define (replace-topping p topping replacement)
  (cond
    [(plain-pizza? p) "plain crust"]
    [else (if (string=? (topped-pizza-topping p) topping)
            (make-topped-pizza replacement
              (replace-topping (topped-pizza-base p) topping replacement))
            (make-topped-pizza (topped-pizza-topping p)
              (replace-topping (topped-pizza-base p) topping replacement)))]))

;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;


