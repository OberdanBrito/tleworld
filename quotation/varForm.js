//Create 2556-09-30 12:00
var data = [
    //                {types:'input',fields:'rowId',keys:'rowId',enLabels:'rowId',thLabels:'rowId'},
    {types: 'input', fields: 'id', keys: 'id', enLabels: 'id', thLabels: 'id'},
    {types: 'input', fields: 'docType', keys: 'docType', enLabels: 'docType', thLabels: 'docType'},
    {types: 'input', fields: 'status', keys: 'status', enLabels: 'status', thLabels: 'status'},
    {types: 'input', fields: 'orderId', keys: 'orderId', enLabels: 'orderId', thLabels: 'orderId'},
    {types: 'input', fields: 'revision', keys: 'revision', enLabels: 'revision', thLabels: 'revision'},
    {types: 'input', fields: 'referenceId', keys: 'referenceId', enLabels: 'referenceId', thLabels: 'referenceId'},
    {types: 'input', fields: 'referenceId2', keys: 'referenceId2', enLabels: 'referenceId2', thLabels: 'referenceId2'},
    //                {types: 'input', fields: 'createDate', keys: 'createDate', enLabels: 'createDate', thLabels: 'createDate'},
    //                {types: 'input', fields: 'issueDate', keys: 'issueDate', enLabels: 'issueDate', thLabels: 'issueDate'},
    //                {types: 'input', fields: 'dueDate', keys: 'dueDate', enLabels: 'dueDate', thLabels: 'dueDate'},
    //                {types:'input',fields:'deliveryDate',keys:'deliveryDate',enLabels:'deliveryDate',thLabels:'deliveryDate'},
    {types: 'input', fields: 'loginCompanyId', keys: 'loginCompanyId', enLabels: 'loginCompanyId', thLabels: 'loginCompanyId'},
    {types: 'input', fields: 'loginUserId', keys: 'loginUserId', enLabels: 'loginUserId', thLabels: 'loginUserId'},
    {types: 'input', fields: 'editorId', keys: 'editorId', enLabels: 'editorId', thLabels: 'editorId'},
    //                {types: 'input', fields: 'editDate', keys: 'editDate', enLabels: 'editDate', thLabels: 'editDate'},
    //                {types: 'input', fields: 'approvePersonId', keys: 'approvePersonId', enLabels: 'approvePersonId', thLabels: 'approvePersonId'},
    //                {types: 'input', fields: 'approvePerson', keys: 'approvePerson', enLabels: 'approvePerson', thLabels: 'approvePerson'},
    //                {types: 'input', fields: 'approveDate', keys: 'approveDate', enLabels: 'approveDate', thLabels: 'approveDate'},
    {types: 'input', fields: 'customerId', keys: 'customerId', enLabels: 'customerId', thLabels: 'customerId'},
    {types: 'input', fields: 'customerName', keys: 'customerName', enLabels: 'customerName', thLabels: 'customerName'},
    {types: 'input', fields: 'contactPerson', keys: 'contactPerson', enLabels: 'contactPerson', thLabels: 'contactPerson'},
    {types: 'input', fields: 'companyAddress', keys: 'companyAddress', enLabels: 'companyAddress', thLabels: 'companyAddress'},
    {types: 'input', fields: 'shippingAddress', keys: 'shippingAddress', enLabels: 'shippingAddress', thLabels: 'shippingAddress'},
    {types: 'input', fields: 'billingAddress', keys: 'billingAddress', enLabels: 'billingAddress', thLabels: 'billingAddress'},
    {types: 'input', fields: 'tel', keys: 'tel', enLabels: 'tel', thLabels: 'tel'},
    {types: 'input', fields: 'fax', keys: 'fax', enLabels: 'fax', thLabels: 'fax'},
    {types: 'input', fields: 'email', keys: 'email', enLabels: 'email', thLabels: 'email'},
    {types: 'input', fields: 'deliverPlace', keys: 'deliverPlace', enLabels: 'deliverPlace', thLabels: 'deliverPlace'},
    {types: 'input', fields: 'employeeId', keys: 'employeeId', enLabels: 'employeeId', thLabels: 'employeeId'},
    {types: 'input', fields: 'employeeName', keys: 'employeeName', enLabels: 'employeeName', thLabels: 'employeeName'},
    {types: 'input', fields: 'employeeTel', keys: 'employeeTel', enLabels: 'employeeTel', thLabels: 'employeeTel'},
    {types: 'input', fields: 'employeeEmail', keys: 'employeeEmail', enLabels: 'employeeEmail', thLabels: 'employeeEmail'},
    //                {types: 'input', fields: 'priceStrId', keys: 'priceStrId', enLabels: 'priceStrId', thLabels: 'priceStrId'},
    {types: 'input', fields: 'unitCost', keys: 'unitCost', enLabels: 'unitCost', thLabels: 'unitCost'},
    {types: 'input', fields: 'sumDiscount', keys: 'sumDiscount', enLabels: 'sumDiscount', thLabels: 'sumDiscount'},
    {types: 'input', fields: 'discountRate', keys: 'discountRate', enLabels: '', thLabels: ''},
    {types: 'input', fields: 'discount', keys: 'discount', enLabels: '', thLabels: ''},
    {types: 'input', fields: 'includeVat', keys: 'inVat', enLabels: 'Include Vat', thLabels: 'Include Vat'},
    //                {types: 'input', fields: '', keys: 'exVat', enLabels: 'Exclude Vat', thLabels: 'Exclude Vat'},
    {types: 'input', fields: 'totalBeforeDiscount', keys: 'totalBeforeDiscount', enLabels: 'totalBeforeDiscount', thLabels: 'totalBeforeDiscount'},
    {types: 'input', fields: 'totalBeforeVat', keys: 'totalBeforeVat', enLabels: 'totalBeforeVat', thLabels: 'totalBeforeVat'},
    //                {types:'input',fields:'vatRate',keys:'vatRate',enLabels:'vatRate',thLabels:'vatRate'},
    {types: 'input', fields: 'vatAmount', keys: 'vatAmount', enLabels: 'vatAmount', thLabels: 'vatAmount'},
    {types: 'input', fields: 'totalIncludeVatNum', keys: 'totalIncludeVatNum', enLabels: 'totalIncludeVatNum', thLabels: 'totalIncludeVatNum'},
    {types: 'input', fields: 'totalIncludeVatStrThai', keys: 'totalIncludeVatStrThai', enLabels: 'totalIncludeVatStrThai', thLabels: 'totalIncludeVatStrThai'},
    {types: 'input', fields: 'totalIncludeVatStrEnglish', keys: 'totalIncludeVatStrEnglish', enLabels: 'totalIncludeVatStrEnglish', thLabels: 'totalIncludeVatStrEnglish'},
    //                {types:'input',fields:'cash',keys:'cash',enLabels:'cash',thLabels:'cash'},
    //                {types:'input',fields:'changeDue',keys:'changeDue',enLabels:'changeDue',thLabels:'changeDue'},
    //                {types:'input',fields:'vatClaim',keys:'vatClaim',enLabels:'vatClaim',thLabels:'vatClaim'},
    {types: 'input', fields: 'footNote', keys: 'footNote', enLabels: 'footNote', thLabels: 'footNote'},
    {types: 'input', fields: 'paymentTerm', keys: 'paymentTerm', enLabels: 'paymentTerm', thLabels: 'paymentTerm'},
    {types: 'input', fields: 'deliveryTerm', keys: 'deliveryTerm', enLabels: 'deliveryTerm', thLabels: 'deliveryTerm'},
    {types: 'input', fields: 'creditTerm', keys: 'creditTerm', enLabels: 'creditTerm', thLabels: 'creditTerm'},
    //                {types: 'input', fields: 'deposit', keys: 'deposit', enLabels: 'deposit', thLabels: 'deposit'},
    {types: 'input', fields: 'commissionRate', keys: 'commissionRate', enLabels: '', thLabels: ''},
    {types: 'input', fields: 'commissionValue', keys: 'commissionValue', enLabels: '', thLabels: ''},
    //                {types: 'input', fields: 'shipVia', keys: 'shipVia', enLabels: 'shipVia', thLabels: 'shipVia'},
    //                {types: 'input', fields: 'domestic', keys: 'local', enLabels: 'Local', thLabels: 'Local'}
    //                {types:'input',fields:'domestic',keys:'export',enLabels:'Export',thLabels:'Export'},
    //                {types:'input',fields:'exportType',keys:'cif',enLabels:'CIF (Cost Insurance Freight)',thLabels:'CIF(Cost  Insurance Freight)'},
    //                {types:'input',fields:'exportType',keys:'fob',enLabels:'FOB (Free On Broad)',thLabels:'FOB(Free  On  Broad)'}
];
var fsCusWidth = 480;
var form = [
    //#######################################################################
    //
    //  ABOVE
    //  
    //#######################################################################
    {type: 'input', name: '', label: 'id', value: "", inputWidth: 200},     //master
    {type: "block",
        list:[
            {type:"settings", inputWidth: 200,position: "label-left" },
            //###############################################################                
            //  Customer Details
            //  
            {type:"fieldset", label:"Customer Detail", width:fsCusWidth, className:"fsCus",
                list:[

                    {type: 'input', name: '', label: 'customerId', value: ''},       //partnerId
                    {type: "block", inputWidth: fsCusWidth, 
                        list:[
                            {type: 'input', name: '', label: 'customerName', value: ''},
                            {type:"newcolumn",offset:0},
                            {type: "button", name: "selCustomerName", label: "", value: "Customer Name", offsetLeft: 15},]
                    },
                    {type: "block", inputWidth: fsCusWidth, 
                        list:[
                            {type: 'input', name: '', label: 'contactPerson', value: ''},
                            {type:"newcolumn",offset:0},
                            {type: "button", name: "selContactPer", label: "", value: "Contact Person", offsetLeft: 15},]
                    },
                    {type: "block", inputWidth: fsCusWidth, 
                        list:[
                            {type: 'input', name: '', label: 'companyAddress', value: '', rows: "3"},
                            {type:"newcolumn",offset:0},
                            {type: "button", name: "selComAddress", label: "", value: "Company Address", offsetLeft: 15},]
                    },
                    {type: "block", inputWidth: fsCusWidth, 
                        list:[
                            {type: 'input', name: '', label: 'shippingAddress', value: '', rows: "3"},
                            {type:"newcolumn",offset:0},
                            {type: "button", name: "selShipAddress", label: "", value: "Shipping Address", offsetLeft: 15},]
                    },
                    {type: "block", inputWidth: fsCusWidth, 
                        list:[
                            {type: 'input', name: '', label: 'billingAddress', value: '', rows: "3"},
                            {type:"newcolumn",offset:0},
                            {type: "button", name: "selBillAddress", label: "", value: "Billing Address", offsetLeft: 15},]
                    },
                    {type: "block", inputWidth: fsCusWidth, 
                        list:[
                            {type: 'input', name: '', label: 'tel', value: ''},
                            //                                        {type:"newcolumn",offset:0},
                            {type: 'input', name: '', label: 'fax', value: ''},]
                    },
                    {type: 'input', name: '', label: 'email', value: ''},
                ]
            },

            //                {type:'input', name: 'rowId', label:'rowId',value:''},

            //###############################################################                
            //  Order Details
            //
            {type:"newcolumn",offset:50},
            {type: "fieldset", label: "Order Detail", className: "quoDet",
                list: [
                    {type: "block", inputWidth: 350,
                        list: [
                            {type: 'input', name: '', label: 'orderId', value: ''},
                            {type: 'input', name: '', label: 'referenceId', value: ''},
                            {type: 'input', name: '', label: 'referenceId2', value: ''},
                            {type: 'input', name: '', label: 'docType', value: 'quotation', disabled: true},
                            {type: 'input', name: '', label: 'status', value: 'draft', disabled: true},
                            {type: 'input', name: '', label: 'revision', value: '0'},
                            {type: 'calendar', name: '', label: 'createDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                            {type: 'calendar', name: '', label: 'issueDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                            {type: 'calendar', name: '', label: 'dueDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                            //                                {type:'calendar', name: '', label:'deliveryDate',value:'',inputWidth:75,dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                            {type: 'input', name: '', label: 'loginCompanyId', value: ''},        //sesCompanyId
                            {type: 'input', name: '', label: 'loginUserId', value: ''},              //sesUserId
                            {type: 'input', name: '', label: 'editorId', value: ''},
                            {type: 'calendar', name: '', label: 'editDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                            {type: 'input', name: '', label: 'employeeId', value: ''},
                            {type: 'input', name: '', label: 'employeeName', value: ''},
                            {type: 'input', name: '', label: 'employeeTel', value: ''},
                            {type: 'input', name: '', label: 'employeeEmail', value: ''},
                        ]
                    }
                ]
            },
        ]//List
    },//Block ABOVE

    //#######################################################################
    //
    //  CENTER
    //  
    //#######################################################################
    {type: "fieldset", label: "List", className: "fs_Center"},

    //                {type: 'input', name: '', label: 'customerId', value: partnerId},
    //                {type: 'input', name: '', label: 'customerName', value: ''}, {type: "button", name: "selCustomerName", label: "", value: "Select Customer Name", offsetLeft: 15},
    //                {type: 'input', name: '', label: 'contactPerson', value: ''}, {type: "button", name: "selContactPer", label: "", value: "Select Contact Person", offsetLeft: 15},
    //                {type: 'input', name: '', label: 'companyAddress', value: '', rows: "2", inputWidth: "250"}, {type: "button", name: "selComAddress", label: "", value: "Select Company Address", offsetLeft: 15},
    //                {type: 'input', name: '', label: 'shippingAddress', value: '', rows: "2", inputWidth: "250"}, {type: "button", name: "selShipAddress", label: "", value: "Select Shipping Address", offsetLeft: 15},
    //                {type: 'input', name: '', label: 'billingAddress', value: '', rows: "2", inputWidth: "250"}, {type: "button", name: "selBillAddress", label: "", value: "Select Billing Address", offsetLeft: 15},
    //                {type: 'input', name: '', label: 'tel', value: ''},
    //                {type: 'input', name: '', label: 'fax', value: ''},
    //                {type: 'input', name: '', label: 'email', value: ''},

    //#######################################################################
    //
    //  FOOTAGE
    //  
    //#######################################################################
    {type: "block", 
        list:[
            {type:"block",
                list:[
                    {type: 'input', name: '', label: 'deliverPlace', value: ''},
                    {type: "newcolumn", offset: 20},
                    {type: 'input', name: '', label: 'unitCost', value: ''},
                ]//block
            },
            //###############################################################                
            //  Term
            //
            {type: "fieldset", label: "term", className: "fs_Term",
                list: [
                    {type: 'select', name: '', label: 'paymentTerm', value: ''},
                    {type: 'select', name: '', label: 'deliveryTerm', value: ''},
                    {type: 'select', name: '', label: 'creditTerm', value: ''},
                    //                        {type: 'input', name: '', label: 'deposit', value: ''},
                ]
            },
            //###############################################################                
            //  Discount
            //
            {type: "fieldset", label: "Discount", className: "commisS",
                list: [
                    {type: "input", name: "", label: "discountRate", value: "0", inputWidth: "auto", disabled: true},
                    {type: "newcolumn", offset: 0},
                    {type: "label", label: "% <-->"},
                    {type: "newcolumn", offset: 0},
                    {type: "input", name: "", label: "discount", value: "0", inputWidth: "auto", disabled: true},
                    {type: "newcolumn", offset: 0},
                    {type: "label", label: "THB", name: "curr"},
                     {type: "input", name: "", label: "sumDiscount", value: "0", inputWidth: "auto", disabled: true},
                    {type: "newcolumn", offset: 0}
                ]
            },
            
            
            //#######################################################################
            //  NEW COLUMN (under Right)
            //#######################################################################
            {type: "newcolumn", offset: 10},
            
            //###############################################################                
            //  VAT
            //
            {type: "fieldset", label: "VAT", className: "fs_Vat",
                list: [
                    {type: "radio", name: "inVat", value: "included", label: "Included Vat", position: "label-right", checked: true},
                    {type: "radio", name: "inVat", value: "excluded", label: "Excluded Vat", position: "label-right"}
                ]
            },

            //###############################################################                
            //  Total
            //
            {type: "fieldset", label: "Total", className: "fs_Total",
                list: [
                    {type: 'input', name: '', label: 'totalBeforeDiscount', value: '0.00'},
                    {type: 'input', name: '', label: 'totalBeforeVat', value: '0.00'},

                    //                {type: "label", label: "", name: "curr"},
                    //                {type:'input', name: '', label:'vatRate',value:''},
                    {type: 'input', name: '', label: 'vatAmount', value: '0.00'},
                    //                {type: "label", label: "", name: "curr"},
                    {type: 'input', name: '', label: 'totalIncludeVatNum', value: '0.00'},
                    //                {type: "label", label: "", name: "curr"},
                    {type: 'input', name: '', label: 'totalIncludeVatStrThai', value: ''},
                    {type: 'input', name: '', label: 'totalIncludeVatStrEnglish', value: ''}
                ]
            },
        ]
    },



    //                {type:'input', name: '', label:'cash',value:''},
    //                {type:'input', name: '', label:'changeDue',value:''},
    //                {type:'input', name: '', label:'vatClaim',value:''},
    //--- DOMESTIC < Shipping >
    //                {type: "fieldset",label: "Domestic Type",inputWidth: 345,className:"typeS",
    //                    list: [
    //                        {type:"settings",
    //                            position:"label-left",
    //                            labelAlign:"right",
    //                            labelWidth:80
    //                        },
    //                        {type: "input", name:"", value:"Local", label:"local",labelWidth: "auto",position: "label-left",checked: true},
    //                        //                        {type: "radio", name:"", value:"", label:"export",labelWidth: "auto",position: "label-right",
    //                        //                            list: [
    //                        //                                {type: "radio", name:"", value:"", label:"cif",labelWidth: "auto",position: "label-right"},
    //                        //                                {type: "radio", name:"", value:"", label:"fob",labelWidth: "auto",position: "label-right"}
    //                        //                            ]
    //                        ////                        },
    //                        {type:'input', name: '', label:'shipVia',value:''}
    //                    ]
    //                },

    {type:"block",list:[{type: 'input', name: '', label: 'footNote', value: '', rows: "2", inputWidth: "350"}]},
    
    //-------------------- BUTTON --------------------
    {type: "fieldset", label: "Button", className: "commisS",
        list: [
            {type: "button", name: "draft", label: "", value: "Save Draft", offsetLeft: 15},
            {type: "newcolumn", offset: 0},
            {type: "button", name: "submit", label: "", value: "Submit", offsetLeft: 15},
            {type: "newcolumn", offset: 0},
            {type: "button", name: "cancel", label: "", value: "Cancel", offsetLeft: 15}
        ]
    },
    //###############################################################                
    //  Commission
    //
    {type: "fieldset", label: "Commission", className: "commisS",
        list: [
            {type: "input", name: "", label: "commissionRate", value: "0", inputWidth: "auto"},
            {type: "newcolumn", offset: 0},
            {type: "label", label: "% <-->"},
            {type: "newcolumn", offset: 0},
            {type: "input", name: "", label: "commissionValue", value: "0", inputWidth: "auto"},
            {type: "newcolumn", offset: 0},
            {type: "label", label: "", name: "curr"}
        ]
    }
    //                {type: "fieldset", label: "Commission", className: "commisS",
    //                    list: [
    //                        {type: "input", name: "", label: "commissionRate", value: "0", inputWidth: "auto"},
    //                        {type: "newcolumn", offset: 0},
    //                        {type: "label", label: "% <-->"},
    //                        {type: "newcolumn", offset: 0},
    //                        {type: "input", name: "", label: "commissionValue", value: "0", inputWidth: "auto"},
    //                        {type: "newcolumn", offset: 0},
    //                        {type: "label", label: "", name: "curr"}
    //                    ]
    //                }
    //                {type: 'input', name: '', label: 'approvePersonId', value: ''},
    //                {type: 'input', name: '', label: 'approvePerson', value: ''},
    //                {type: 'input', name: '', label: 'approveDate', value: ''},
    //                {type: "fieldset", label: "For Approve Person", className: "commisS",
    //                    list: [
    //                        {type: "button", name: "approve", label: "", value: "Approve", offsetLeft: 15},
    //                        {type: "newcolumn", offset: 0},
    //                        {type: "button", name: "notApprove", label: "", value: "Not Approve", offsetLeft: 15}
    //                    ]
    //                }
];