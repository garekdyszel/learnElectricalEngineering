<?php

echo'<html>';
include $_SERVER["DOCUMENT_ROOT"] . "/includes/functions.php";
include $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php";
include $_SERVER["DOCUMENT_ROOT"] . "/includes/header_menu.php";
beginPage();
beginWrapper();
?>
<!-- Main -->
      <div id="main">
        <div class="inner">
          <h1>Analog Circuits</h1>
          <span class="image main"><img src="images/pic13.jpg" alt=""><br>
        </span></div>
        <div class="inner">
          <h1>Lesson 1.5: Ohm's Law Revisited: Impedances</h1>
          <p>If you couldn't tell, I was dying to get to this part. I gave you a
            pretty short version of what the current-voltage relationships are,
            so you could see how hard they can be to remember! I'll show you
            where the complex number representation comes from, first. Then, we'll talk about why representing
            everything as impedances can make circuit analysis much easier!</p>
          <h2>The mathematical foundations</h2>
          <p></p>
          <p>We're allowed to get away with turning all our calculus into
            algebra, because of the Fourier Transform. It says that any signal,
            no matter how random, can be decomposed into sums of sines and
            cosines. From there, we can use Euler's formula</p>
          <p>\( e^{j \omega t} = \cos{(\omega t)} + j \sin{(\omega t)} \)</p>
          <p>to transform all our signals into complex numbers. So we're representing all the signals as this single number, \( e^{j \omega t} \). <br>
            If you take the time derivative of \( e^{j \omega t} \), you get \( j \omega \cdot e^{j \omega t} \). Don't forget,  \( \omega = 2 \pi f \), where \( \omega \) is the frequency measured in \( rad / s \), and \( f \) is the frequency measured in \( Hz \).<br>
            Guess what else is cool? Because the Laplace Transform and the Fourier Transform are basically equivalent, you can make the substitution \( s = j \omega \) to save some writing. (Also, it's a little easier to remember frequency is actually a <em>single</em> variable that way.) <br>
            We call this variable \( s \) an <em>s-parameter</em>.
          </p>
          <h2>The impedance formulas</h2>
          <p></p>
          <div id="outline-container-org25aa3ac" class="outline-3">
            <meta http-equiv="content-type" conte
                  nt="text/html; charset=utf-8">
            <h3 id="org25aa3ac"></h3>
            <div class="inner">
              <p>
                This one will knock your socks off. <br> <br>
                You can analyze circuits using s-parameters to get solutions for both DC and AC conditions simultaneously.
                It boils down to two steps. You can omit the second step if you want to know the
                AC behavior at reasonable frequencies (around \( 1 kHz \) up to around \( 1 MHz \)).
              </p>
              <p>
                <ol>
                <li> Analyze the circuit using s-parameters. </li>
                <li> Take the limit s → 0 (dc) or s → ∞ (high-frequency ac). </li>
                </ol>
              </p>
              <p>
                Now, I'm sure you're asking, "Well, how the heck can you do that?". 
              </p>
              <p> We're going to use a generalization of Ohm's Law. If you remember how it was defined, we
                didn't actually say whether we were using the real numbers \( \mathbb{R} \) or the complex
                numbers \( \mathbb{C} \) to define the resistance. Resistance is actually defined in the real
                numbers.
              </p>
              <p> Impedances are a generalization of "resistance" to the complex numbers. They're usually
                written in this general form. \( Z \) is the impedance, \( R \) is the real part of the
                impedance, and \( X \) is the imaginary part of the impedance. \( R \) is called the resistance,
                like before. \( X \) is called the <em>reactance</em>.
              </p>
              <p> \( Z = R + j X \) </p>
              <p> We can write any arbitrary complex number in two forms: rectangular or polar. There are two
                subsets of the polar form: the exponential and magnitude/angle forms.</p>
              <p> Rectangular: \( R + j X \). </p>
              <p> Polar exponential: \( |Z| e^{j \phi} \). </p>
              <p> Polar magnitude/angle: \( |Z| \angle \phi \). </p>
              <p> You get to the polar forms from the rectangular form through these formulas: </p>
              <p> \( |Z| = \sqrt{R^2 + X^2} \). </p>
              <p> \( \phi = \arctan(\frac{X}{R}) \). </p>
              <img src="images/part1/complex_numbers.png" alt="(Summary of complex number relationships. For any complex number Z = R + j X, the real part of Z is R, and the imaginary part of Z is X. The magnitude of Z is the square root of the quantity R squared plus X squared, and the phase of Z is the inverse tangent of X over R.)">
              <p> Remember that nice idea from up above?  \( [ \frac{d}{dt}(e^{j \omega t}) = (j \omega) \cdot
                e^{j \omega t}. ] \) If you want to take a time derivative of a complex number, you just multiply
                by \( j \omega \). <br>
                Now we can use it to convert our current-voltage equations for capacitors and inductors into
                impedance form. For a capacitor, we had \( I = C \frac{dV}{dt} \). If we assume both the
                current and the voltage are complex numbers, we get </p>
                <p> \( I = j \omega C V  \). </p>
              <p> after using our time derivative rule. If you do a similar thing for the inductor
                equation, you get </p>
              <p> \( V = j \omega C I \). </p>
              <p> If we use Ohm's Law for an arbitrary impedance, \( V = Z I \), we can see immediately that </p>
              <p> \( Z = \frac{V}{I} \). </p>
              <p> So that's the definition of impedance. We'll need to get our formulas in this form if we want
                to see what the impedances really are. For a capacitor, we end up with </p>
              <p> \( Z = \frac{1}{j \omega C} (= \frac{- j}{\omega C}) \). </p>
              <p> An inductor's impedance formula is </p>
              <p> \( Z = j \omega L \). </p>
              <p> I'll apply \( s = j \omega \) next, to write these in a more compact format. Finally, </p>
              <p> \( Z = \frac{1}{s C} \) (capacitor), and </p>
              <p> \( Z = s L \) (inductor). </p>
              <p> You can use these to figure out how your circuit behaves without having to take derivatives.
                Cool, huh?</p>
              <p><strong>Bottom line.</strong> \( Z = R \) for a resistor, \( Z = \frac{1}{s C} \) for a
                capacitor, and \( Z = s L \) for an inductor. If you want to know how the circuit responds to DC
                input, take the limit of your final answers as \(s \rightarrow 0 \). If you want to see how the
                circuit responds to super-high frequencies, take the limit of your final answers as \( s
                \rightarrow \infty \). Lastly, if you need the behavior at a specific frequency \( f \), set \(
                s = j 2 \pi f \) and shove it into your calculator. </p>

      <!-- Footer -->
<?php
endWrapper();
include $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php";
include $_SERVER["DOCUMENT_ROOT"] . "/includes/js_assets.php";
endPage();
?>
