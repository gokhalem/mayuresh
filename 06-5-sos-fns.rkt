;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname 06-5-sos-fns) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;; Sos and Loss Practice

(require rackunit)
(require rackunit/text-ui)

;; Data Definitions

;; An S-expression of Strings (SoS) is either
;; -- a String
;; -- a List of SoS's (LoSS)

;; A List of SoS's (LoSS) is either
;; -- empty
;; -- (cons SoS LoSS)

;; TEMPLATES
;; ;; sos-fn : SoS -> ??
;; (define (sos-fn s)
;;   (cond
;;     [(string? s) ...]
;;     [else (... (loss-fn s)]))

;; ;; loss-fn : LoSS -> ??
;; (define (loss-fn los)
;;   (cond
;;     [(empty? los) ...]
;;     [else (... (sos-fn (first los))
;;                (loss-fn (rest los)))]))

;; characters-in : Sos -> Number
;; characters-in-loss : Loss -> Number
;; RETURNS: the total number of characters in the strings in the 
;; given sos or loss.
;; STRATEGY: Structural decomposition
;; characters-in : SoS -> ??
(define (characters-in s)
  (cond
    [(string? s) (string-length s)]
    [else (characters-in-loss s)]))

;; characters-in-loss : LoSS -> ??
(define (characters-in-loss los)
  (cond
    [(empty? los) 0]
    [else (+ (characters-in (first los))
            (characters-in-loss (rest los)))]))

(define-test-suite characters-in-tests

  (check-equal?
   (characters-in
    (list "alice" 
          (list (list "alice" "bob") "carole")
          "dave"))
   23)
  )

(run-tests characters-in-tests)



