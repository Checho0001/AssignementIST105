import sys
import datetime

def result_steps_html(a, b, c):
    if a == 0:
        return "<p style='color:red;'>Error: value of 'a' can't be zero (division by zero).</p>"

    c_cubed = c ** 3
    c_sqrt = c_cubed ** 0.5
    division = c_sqrt / a
    multiplication = division * 10
    result = b + multiplication

    html_response = f"""
    <h2>Final result : {result} <h2>
    <ul>
        <li><strong>Step 1:</strong> c = {c} : c<sup>3</sup> = {c_cubed}</li>
        <li><strong>Step 2:</strong> √(c<sup>3</sup>) = {c_sqrt}</li>
        <li><strong>Step 3:</strong> {result} / {a} = {division}</li>
        <li><strong>Step 4:</strong> {division} * 10 = {multiplication}</li>
        <li><strong>Step 5:</strong> {b} + {result} = <strong>{result}</strong></li>
    </ul>
    <p>Calculation completed at {datetime.datetime.now()}</p>
    """
    return html_response

# read input from user
try : 
    a = float(sys.argv[1])
    b = float(sys.argv[2])
    c = float(sys.argv[3])
except ValueError:
    print("Error: Input must be a number.")
    sys.exit(1)


print(result_steps_html(a, b, c))
