;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-intermediate-lambda-reader.ss" "lang")((modname guidedpractice6.2) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
  
(define-struct leaf (datum))
(define-struct node (lson rson))

;; A Tree is either
;; -- (make-leaf Number)
;; -- (make-node Tree Tree) 

  ;; number-of-nodes : Tree -> Number
;; Returns the number of nodes in the given tree.

;; increment-all : Tree -> Tree
;; Returns a tree just like the original, but in which all of the
;; leaves have contents one more than that in the original

  
  
;tree-fn : Tree -> ???
;tree-fold : ... Tree -> ???
(define (tree-fold combiner base t)
  (cond
    [(leaf? t) (base (leaf-datum t))]
    [else (combiner
            (tree-fold combiner base (node-lson t))
            (tree-fold combiner base (node-rson t)))]))

(define (increment-all t)
  (tree-fold + 1
             (lambda (n) n) t)) 


