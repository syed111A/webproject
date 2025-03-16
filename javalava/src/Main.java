class Employee {
    
    // Attributes
    String name;
    int age;
    float salary;
    String position;
    String hireDate;

    // Methods
    @Override
    public String toString() {
        return "Employee: " + name + ", Position: " + position;
    }

    public String toRepr() {
        return "Employee(" + name + ", " + age + ", " + salary + ", " + position + ")";
    }

    public void displayDetails() {
        System.out.println("Name: " + name + ", Age: " + age + ", Salary: " + salary + ", Position: " + position + ", Hire Date: " + hireDate);
    }

    public double annualBonus() {
        return salary * 0.10;
    }

    public void promote(String newPosition, double increment) {
        position = newPosition;
        salary += increment;
    }

    public void demote(String newPosition, float decrement) {
        position = newPosition;
        salary = Math.max(salary - decrement, 0); // Ensure salary doesn't go below 0
    }

    public int retirementAge() {
        return Math.max(65 - age, 0); // Years left until retirement
    }

    public void increaseSalary(double percentage) {
        salary *= (1 + percentage / 100);
    }

    public String compareSalary(Employee otherEmployee) {
        if (this.salary > otherEmployee.salary) {
            return "Higher";
        } else if (this.salary < otherEmployee.salary) {
            return "Lower";
        } else {
            return "Equal";
        }
    }
}

class Manager extends Employee {
    // Additional Attribute
    int teamSize;

    // Override Methods
    @Override
    public String toString() {
        return "Manager: " + name + ", Team Size: " + teamSize;
    }

    @Override
    public double annualBonus() {
        return salary * 0.15 + salary * 0.01 * teamSize;
    }

    // Additional Methods
    public void increaseTeamSize(int newMembers) {
        teamSize += newMembers;
    }

    public void reduceTeamSize(int lostMembers) {
        teamSize = Math.max(teamSize - lostMembers, 0); // Ensure team size doesn't go below 0
    }

    public void mentorEmployee(Employee employee) {
        System.out.println("Manager " + name + " is mentoring " + employee.name);
    }
    public static void main(String[] args) {
    }
}
public class Main {
    public static void main(String[] args) {
        // Empty main method
        
    }
}

   