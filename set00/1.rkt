;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |1|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;;leap: Number -> Number
;;GIVEN:the number of days in a leap year.
;;RETURNS: the number of seconds in a leap year.
;;Examples:
;;(leap 366)=31622400

(define (leap days)
        (* days(* 24(* 60 60))))
  
(leap 366)
;;Test:
(check-expect (leap 366)31622400)