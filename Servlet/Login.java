/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.beans.Statement;
import java.sql.Connection;
import java.sql.*;

/**
 *
 * @author Shraddha
 */
@WebServlet(urlPatterns = {"/Login"})
public class Login extends HttpServlet {

    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            //access username and password
            String username = request.getParameter("username");
            String password = request.getParameter("password");
            java.sql.Statement stmt = null;
            //database
            try{
                //open connection
                Class.forName("com.mysql.jdbc.Driver");
                Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/WT","root","root");
                
                //get data from table using query
                stmt = con.createStatement();
                ResultSet rs = stmt.executeQuery("select * from login where username = '"+username+"' and password = '"+password+"' ");
                
                if(rs.next()){
                    //if username and password true the goto home page
                    response.sendRedirect("Home.html");
                }
                else{
                    out.println("wrong username and password");
                }
                
                con.close();
            }
            catch(Exception e){
                System.out.println(e.getMessage());
            }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
   
}
