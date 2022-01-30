<%@ attribute name="items" type="java.lang.String" required="false" description="(String) items container, used by tag only" %>
<%@ attribute name="fields" type="java.lang.String" required="false" description="(String) Fields definition, generated automatically." %>
<%@ attribute name="colSize" type="java.lang.Integer" required="false" description="(Integer) Column size, generated automatically." %>
<%@ attribute name="sm" type="java.lang.String" required="false" description="(String) Panel Selection model, generated automatically." %>
<%@ include file="inc/taglibs.jsp" %><%@ tag import="org.apache.commons.beanutils.BeanUtils" dynamic-attributes="dynamicAttributes" description="Simple tag collectiong col models" %>
<% BeanUtils.setProperty(this,"colSize",new Integer(0)); %><jsp:doBody /><extutil:setParentProperties tag='<%= this %>' removeComma="true" fields='<%= BeanUtils.getProperty(this,"fields")%>' colModel='<%= BeanUtils.getProperty(this,"items")%>' sm='<%= BeanUtils.getProperty(this,"sm")%>'/>