;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname snackmachine) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;;DATA DEFINITIONS
(define-struct machine(choclate-bars carrot-sticks bank1 temp ))

;;A Machine is a (make-machine Number Number Number)
;;choclate-bars gives number of choclate-bars in the machine.
;;carrot-sticks gives number of carrot-sticks in the machine.
;;bank1 is a container that holds number of cents.
;;temp is a container that holds number of cents till the time 
;;product is sucessfully purchased and it also returns the change.
;;TEMPLATE:
;;(define (machine-fn b)
;;  (...
;;    (machine-choclate-bars b)
;;    (machine-carrot-sticks b)
;;    (machine-bank1 b)
;;    (machine-temp b))
;;
;;initial-machine : Number Number -> Machine
;;GIVEN: the number of chocolate bars and the number of packages of
;;carrot sticks
;;RETURNS: a machine loaded with the given number of chocolate bars and
;;carrot sticks, with an empty bank.
;;Example:
;;(initial-machine 20 40)=> (make-machine 20 40 0 0)

(define (initial-machine choclate-bars carrot-sticks)
  (make-machine choclate-bars carrot-sticks 0 0) )
;;Test:  
(check-expect (initial-machine 20 40) (make-machine 20 40 0 0))

;; DATA DEFINITION:
;;A CustomerInput is one of
;;-- a positive Number interp: insert the specified number of cents
;;-- "chocolate"       interp: request a chocolate bar
;;-- "carrots"         interp: request a package of carrot sticks
;;-- "release"         interp: return all the coins that the customer has put.

;; TEMPLATE
;; CustomerInput-fn : customer-input -> ??
;;(define (CustomerInput-fn a-customer-input)
;;  (cond
;;    [(number=? a-customer-input "3")
;;    ...]
;;    [(string=? a-customer-input "choclate")    
;;     ...]
;;    [(string=? a-customer-input "carrots")
;;     ...]
;;    [(string=? a-customer-input "release")  
;;     ...]))    
(define carrot-price 70)
(define choclate-bar-price 175)
;;machine-next-state : Machine CustomerInput -> Machine
;;GIVEN: a machine state and a customer input
;;RETURNS: the state of the machine that should follow the customer's
;;input
;;Example:
;;(machine-next-state (make-machine 20 40 0 0) 59)=>(make-machine 20 40 0 59)
;;STRATEGY: structural decomposition [customer-input]
(define(machine-next-state x-machine a-customer-input)
  (cond
    [(number? a-customer-input)(make-machine( machine-choclate-bars x-machine )
     ( machine-carrot-sticks x-machine ) 0  a-customer-input)]          
    [(and(string=? a-customer-input "carrots")(money-available x-machine a-customer-input)
     (stock-available  x-machine a-customer-input))(make-machine(machine-choclate-bars x-machine )
     (update-stock  x-machine a-customer-input)(update-bank x-machine a-customer-input)(calculate-change x-machine a-customer-input))]
    [(and(string=? a-customer-input "choclate-bars")(money-available x-machine a-customer-input)(stock-available  x-machine a-customer-input))
     (make-machine  (update-stock  x-machine a-customer-input) ( machine-carrots x-machine ) (update-bank x-machine a-customer-input) 
     (calculate-change x-machine a-customer-input))]
    [(string=? a-customer-input "release") (machine-release x-machine)]))
;;Test:
(check-expect(machine-next-state (make-machine 20 40 0 0) 59)(make-machine 20 40  0 59))
(check-expect(machine-next-state (make-machine 20 40 0 100) "carrots")(make-machine 20 39 70 30))
(check-expect(machine-next-state (make-machine 20 40 0 200) "choclate-bars")(make-machine 19 40 175 25))
(check-expect(machine-next-state (make-machine 20 40 0 200) "release") 200)
;;money-available: Machine CustomerInput ->Boolean
;;Given:a machine state and acustomer input
;;Returns: true iff money in bank is greater than product price
;;Example:
;;(money-available (make-machine 20 40  0 70) "carrots")
;;
(define(money-available  x-machine a-customer-input)
  (cond
    [ (and(string=? a-customer-input "carrots") (>=( machine-temp x-machine ) 70)) true ]
    [ (and(string=? a-customer-input "choclate-bars") (>=( machine-temp x-machine ) 175)) true ]
    [else false]))

;;Test:
(check-expect(money-available (make-machine 20 40 0 70) "carrots") true)
(check-expect(money-available (make-machine 20 40 0 175) "choclate-bars") true)
(check-expect(money-available (make-machine 20 40 0 170) "choclate-bars") false)

;;stock-available: Machine CustomerInput ->Boolean
;;Given:a machine state and acustomer input
;;Returns: true iff stock in machine is availabel.
;;Example:
;;(stock-available (make-machine 20 40 0 70) "carrots")=> true
(define(stock-available  x-machine a-customer-input)
  (cond
    [ (and(string=? a-customer-input "carrots") (>=( machine-carrot-sticks x-machine ) 1)) true ]
    [ (and(string=? a-customer-input "choclate-bars") (>=( machine-choclate-bars x-machine ) 1)) true]
    [else false ]))

;;Test:
(check-expect(stock-available (make-machine 20 40 0 70) "carrots") true)
(check-expect(stock-available (make-machine 20 40 0 175) "choclate-bars") true)
(check-expect(stock-available (make-machine 0 40  0 175) "choclate-bars") false)

;;update-stock: Machine CustomerInput ->Number
;;Given:a machine state and a customer input
;;Returns: number of carrot-sticks or choclate-bars in the machine .
;;Example:
;;(update-stock (make-machine 20 40 0 70) "carrots")=> 39
(define(update-stock  x-machine a-customer-input)
  (cond
    [ (string=? a-customer-input "carrots") (-( machine-carrot-sticks x-machine ) 1) ]
    [ (string=? a-customer-input "choclate-bars") (-( machine-choclate-bars x-machine ) 1)]
    [else false ]))

;;Test:
(check-expect(update-stock (make-machine 20 40 0 70) "carrots") 39)
(check-expect(update-stock (make-machine 20 40 0 175) "choclate-bars") 19)
(check-expect(update-stock (make-machine 0  40 0 175) "choclate3-bars") false)
;;update-bank: Machine CustomerInput ->Number
;;Given:a machine state and a customer input
;;Returns: the amount sucessfully deposited in the bank
;;Example:
(define (update-bank x-machine a-customer-input)
  (cond
  [ (string=? a-customer-input "carrots")(+( machine-bank1 x-machine )carrot-price)] 
  [ (string=? a-customer-input "choclate-bars")(+( machine-bank1 x-machine )
     choclate-bar-price)]
  [else false]))
;;Test:
(check-expect(update-bank (make-machine 20 40 0 70) "carrots") 70)
(check-expect(update-bank (make-machine 20 40 0 175) "choclate-bars") 175)
(check-expect(update-bank (make-machine 0  40 0 175) "choclate3-bars") false)
;;calculate-change: Machine CustomerInput ->Number
;;Given:a machine state and a customer input
;;Returns:  the amount to be returned as change
;;Example:
(define (calculate-change x-machine a-customer-input)
  (cond
  [ (string=? a-customer-input "carrots")(-( machine-temp x-machine )carrot-price)] 
  [ (string=? a-customer-input "choclate-bars")(-( machine-temp x-machine )
     choclate-bar-price)]
  [else false]))
;;Test:
(check-expect(calculate-change (make-machine 20 40 0 170) "carrots") 100)
(check-expect(calculate-change (make-machine 20 40 0 175) "choclate-bars") 0)
(check-expect(calculate-change (make-machine 0  40 0 175) "choclate3-bars") false)
                                               
;;machine-chocolates : Machine -> Number
;;GIVEN: a machine state
;;RETURNS: the number of chocolate bars left in the machine
;;Examples:
;;(machine-choclates (make-machine 20 40 0 0))=>20

(define (machine-choclates x-machine)  
   ( machine-choclate-bars x-machine ))
;;Test:
(check-expect(machine-choclates (make-machine 20 40 0 0)) 20)
;;machine-carrots : Machine -> Number
;;GIVEN: a machine state
;;RETURNS: the number of packages of carrot sticks left in the machine
;;Examples:
;;(machine-carrots (make-machine 20 40 0 0))=>40

(define (machine-carrots x-machine)  
   ( machine-carrot-sticks x-machine ))
;;Test:
(check-expect( machine-carrots (make-machine 20 40 0 0)) 40)
;;machine-bank : Machine -> Number
;;GIVEN: a machine state
;;RETURNS: the amount of money in the machine's bank, in cents
;;Examples:
;;(machine-bank (make-machine 20 40 0 0))=>0
(define (machine-bank x-machine)  
   ( machine-bank1 x-machine ))
;;Test:
(check-expect(machine-bank (make-machine 20 40 0 0)) 0)
;;machine-release: Machine -> Number
;;GIVEN: a machine state
;;RETURNS:the amount of money in the machine's bank at that point,
;;in cents on invoking release 
;;Examples:
;;(machine-release (make-machine 20 40 0 45))=>45
(define (machine-release x-machine)  
   ( machine-temp x-machine ))
;;Test:
(check-expect(machine-release (make-machine 20 40 0 45)) 45)